<?php

// require pour l'autoloading
require_once './../vendor/autoload.php';


//Démarrage de la session 
session_start();

/* ------------
--- ROUTAGE ---
-------------*/
// création de l'objet router
$router = new AltoRouter();


// définition du basepath
if (array_key_exists('BASE_URI', $_SERVER)) {
   
    $router->setBasePath($_SERVER['BASE_URI']);
}
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

// Require du fichier contenant les routes
require_once 'routes.php';


/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

// On transmet les arguments au constructeur du contrôleur cible
// `composer update benoclock/alto-dispatcher` si besoin !
$dispatcher->setControllersArguments($router, __DIR__ . '/../App');

$dispatcher->dispatch();




/* Mémo : 
 Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
 On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
 1er argument : la variable $match retournée par AltoRouter
 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');

 On transmet les arguments au constructeur du contrôleur cible
 `composer update benoclock/alto-dispatcher` si besoin !
$dispatcher->setControllersArguments($router);

 Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();
*/


// Router et Dispatcher à la mano */
/*
$routes = [
    // lorsque le visiteur demande la home page ($url vaut alors "/")
    // nous allons instancier un objet MainController puis appeler la méthode  home()
    '/' => [
        'controllerName' => 'MainController',
        'methodName' => 'home'
    ],
    '/category' => [
        'controllerName' => 'CatalogController',
        'methodName' => 'category'
    ],
];


// nous voulons vérifier si l'url demandée par le visiteur existe dans notre tableau de configuration
if(isset($routes[$url])) {
    // récupération des informations pour l'url demandée
    $routeData = $routes[$url];
    $controllerName = $routeData['controllerName'];
    // instanciation d'un objet du type demandé (le type demandé est stocké dans la variable $controllerName)
    $controller = new $controllerName();
    // récupération du nom de la méthode à appeller
    $methodName = $routeData['methodName'];
    // appel de la méthode "dynamiquement"
    // pour la home page c'est comme si nous faisions $controller->home();
    $controller->$methodName();
}
else {
    echo 'GERER LA PAGE 404';
    echo __FILE__.':'.__LINE__; exit();
}
*/