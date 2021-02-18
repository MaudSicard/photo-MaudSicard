<?php

namespace App\Controllers;
use App\Models\Pictures;

class MainController extends CoreController {

    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        $picturesModel = new Pictures;
        $picturesList = $picturesModel->findAll();
        $this->show('main/home', ['picturesList'=> $picturesList]);
    }

     /**
     * Méthode s'occupant de la page de contact
     *
     * @return void
     */
    public function contact()
    {
        $this->checkAutorization(['admin', 'catalog-manager']);

        $this->show('main/contact');
    }

     /**
     * Méthode s'occupant de la page de gestion
     *
     * @return void
     */
    public function gestion()
    {
        $this->checkAutorization(['admin', 'catalog-manager']);

        $this->show('main/gestion');
    }
}

