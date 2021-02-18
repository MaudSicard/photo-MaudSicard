<?php

namespace App\Controllers;
use App\Models\Pictures;
use App\Models\Category;
use App\Models\User;

class ArticleController extends CoreController {

     /**
     * Méthode s'occupant de la page de contact
     *
     * @return void
     */
    public function biographie()
    {
        $this->show('article/biographie');
    }
}