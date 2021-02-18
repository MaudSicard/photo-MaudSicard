<?php

namespace App\Controllers;

use App\Models\Pictures;
use App\Models\Category;
use App\Models\User;

class CategoryController extends CoreController {

   /**
     * Méthode qui appelle la page de formulaire pour ajouter une catégorie
     * @return void
     */
    public function insertCategory()
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $csrf_token = $this->generateCsrfToken();
        $this->show('category/categoryForm', ['csrf_token' => $csrf_token]);
    }

    /**
     * Méthode qui renvoie vers le formulaire de modification une catégorie
     * @return void
     */
    public function updateCategory($param) 
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $categoryModel = new Category;
        $currentCategory = $categoryModel->find($param);
        $csrf_token = $this->generateCsrfToken();
        $this->show('category/categoryForm', ['currentCategory'=>$currentCategory, 'csrf_token' => $csrf_token]);
    }


    /**
     * Méthode qui insère une nouvelle catégorie
     * @return void
     */

    public function insertCategoryPost()
    {
        $nameValue = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        $errorList = [];
    
        if(empty($nameValue))
        {
            $errorList[] = 'La catégorie est vide';
        }

        if(!empty($errorList))
        {
            $this->show('main/gestion',
            ['errorList'=> $errorList, 
            'nameValue'=>$nameValue
            ]);
        }
        else
        {
            $categoryModel = new Category;
            $categoryModel->setName($nameValue);
        
            $saved = $categoryModel->insert();
        }

        if($saved)
        {
            echo 'L\'insertion a bien été effectuée';
            $this->show('main/gestion', ['categoryModel'=>$categoryModel]);
        }
        else
        {
            $errorList[] = 'Une erreur est survenue, merci de réessayer';
    
            $this->show('main/gestion', ['categoryModel'=>$categoryModel,'errorList'=>$errorList]);
        }
    }


    /**
     * Méthode qui met à jour une catégorie
     * @return void
     */

    public function updateCategoryPost($param)
    {
        $nameValue = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

        $errorList = [];
    
        if(empty($nameValue))
        {
            $errorList[] = 'La catégorie est vide';
        }

        if(!empty($errorList))
        {
        $this->show('main/gestion',
        ['errorList'=> $errorList, 
        'nameValue'=>$nameValue
        ]);
        }
        else
        {
        $categoryModel = new Category;
        $currentCategory = $categoryModel->find($param);
        $currentCategory->setName($nameValue);
    
        $saved = $currentCategory->update();
        }

        if($saved)
        {
            echo 'La modification a bien été effectuée';
            $this->show('main/gestion', ['currentCategory'=>$currentCategory]);
        }
        else
        {
            $errorList[] = 'Une erreur est survenue, merci de réessayer';
    
            $this->show('main/gestion', ['currentCategory'=>$currentCategory,'errorList'=>$errorList]);
        }
    }

}
