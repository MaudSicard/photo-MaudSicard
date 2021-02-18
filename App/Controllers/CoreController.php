<?php

namespace App\Controllers;

use AltoRouter;
use App\Models\Category;
use App\Models\Picture;

abstract class CoreController
{

    /**
     * @var Altorouter $router Le routeur du contrôleur
     * 
     * Tous les contrôleurs auront accès à $this->router->generate()
     */
    protected $router;

    private $currentRouteName;

    /**

     * 
     * @param AltoRouter $router Le router du contrôleur
     * @return void
     */
    
    public function __construct(AltoRouter $router)
    {
        // On stocke le routeur dans l'objet
        $this->router = $router;
        // On récupère le match d'Altorouter
        global $match;

        // Pour accéder à la route trouvée
        $this->currentRouteName = $match['name'];

        // Configuration et gestion des ACL
        $this->configureAcl();

        // Configuration et gestion du token CSRF
        // dump($_POST['csrf_token'], $_SESSION['csrf_token']);
        $this->configureCsrf();
    }

    /**
     * Configuration CSRF
     */

    private function configureCsrf()
    {
        // Les routes présentes dans ce tableau, nécessitent une vérification
        $csrfTokenToCheckIn = [
            'new_user_post',
            'insert_category_post',
            'update_category_post',
            'insert_picture_post',
            'update_picture_post',
        ];

    
        if (in_array($this->currentRouteName, $csrfTokenToCheckIn)) 
        {
            // On récupère le token 
            $token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';

            // On récupère le token en SESSION
            $sessionToken = isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '';

            // S'ils ne sont pas égaux ou vide
            if ($token !== $sessionToken || empty($token)) {

                http_response_code(403);
                $this->show('error/err403');
                exit();
            }
        }
        
    }
    
    /**
     * Configuration ACL
     */
    
    protected function configureAcl()
    {
        // On définit dans un tableau associatif la liste des routes
        // et des permissions associées
        // clé = route / valeur = liste des permissions
        $acl = [
            'main_gestion' => ['admin', 'catalog-manager'],
            'new_user' => ['admin'],
            'new_user_post' => ['admin'],
            'main_contact' => ['admin', 'catalog-manager'],
            'main_contact_post' => ['admin', 'catalog-manager'],
            'pictures' => ['admin', 'catalog-manager'],
            'pictures_list' => ['admin', 'catalog-manager'],
            'pictures_list_form' => ['admin', 'catalog-manager'],
            'insert_picture' => ['admin', 'catalog-manager'],
            'insert_picture_post' => ['admin'],
            'update_picture' => ['admin', 'catalog-manager'],
            'update_picture_post' => ['admin'],
            'article_biographie' => ['admin', 'catalog-manager'],
            'insert_category' => ['admin', 'catalog-manager'],
            'insert_category_post' => ['admin'],
            'update_category' => ['admin', 'catalog-manager'],
            'update_category_post' => ['admin'],
        ];

        // Si la route existe dans le tableau,
        if (array_key_exists($this->currentRouteName, $acl)) {
            // on récupère les permissions associées
            $authorizedRoles = $acl[$this->currentRouteName];
            // on appelle checkAuthorization
            $this->checkAutorization($authorizedRoles);
        }
    }
    
    protected function checkAutorization($statut=[])
    {
        // si le user est connecté
        if (isset($_SESSION['userId'])) 
        {
            //on récupère l'utilisateur connecté par l'intermédiaire de $_SESSION
            $currentUser = $_SESSION['userObject'];
            $currentUserStatut = $currentUser->getStatut();
            // on vient vérifier que l'entrée $currentUserStatut est bien dans le tableau $roles
            if (in_array($currentUserStatut, $statut)) 
            {
                return true;
            } 
            else 
            {
                http_response_code(403);
                $this->show('error/err403');
                exit();
            }
        } 
        else 
        {
            // si l'utilisateur n'est pas connecté, on le renvoie vers la page de login
            header('Location: ' . $this->router->generate('user_login'));
            exit();
        }
    }

    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewVars Tableau des données à transmettre aux vues
     * @return void
     */

    protected function show(string $viewName, array $viewVars = [])
    {
        $viewVars['currentPage'] = $viewName;

        $viewVars['assetsBaseUri'] = $_SERVER['BASE_URI'] . '/assets/';
        
        $viewVars['baseUri'] = $_SERVER['BASE_URI'];
        
        extract($viewVars);
     
        
        global $router;

        // Instanciation d'un modèle category pour la nav (réutiliser dans chaque page)
        $categoryModel = new Category;
        $categoryList = $categoryModel->findAll();

        require_once __DIR__.'/../views/layout/header.tpl.php';
        require_once __DIR__.'/../views/'.$viewName.'.tpl.php';
        require_once __DIR__.'/../views/layout/footer.tpl.php';
    }

    /**
     * Génère un token CSRF et le stocke en session pour usage ultérieur
     *
     * @return string Le token
     */
    
    protected function generateCsrfToken()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Génère une chaine aléatoire
            $csrf_token = bin2hex(random_bytes(32));
            // On stocke en session
            $_SESSION['csrf_token'] = $csrf_token;
        }

        return $csrf_token;
    }
}