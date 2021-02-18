<?php

namespace App\Controllers;
use App\Models\Pictures;
use App\Models\Category;
use App\Models\User;

class PicturesController extends CoreController 
{
    /**
     * Méthode qui appelle les pages photo en fonction de la categorie
     * @return void
     */
    public function pictures($param)
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $picturesModel = new Pictures;
        $currentPictures = $picturesModel->find($param);

        $this->show('pictures/pictures', ['currentPictures'=>$currentPictures]);
    }

     /**
     * Méthode qui liste les photos par catégorie en vue de modification (la vue appelée est différente de la méthode précédente)
     * @return void
     */
    public function picturesList($param)
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $picturesModel = new Pictures;
        $currentPictures = $picturesModel->find($param);

        $this->show('pictures/picturesList', ['currentPictures'=>$currentPictures]);
    }

    /**
     * Méthode qui renvoie   en vue de modifier un élément dans la bdd
     * @return void
     */
    public function picturesListForm($param)
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $picturesModel = new Pictures;
        $currentPictures = $picturesModel->find($param);

        $this->show('pictures/picturesListForm', ['currentPictures'=>$currentPictures]);
    }

    /**
     * Méthode qui appelle la page de formulaire pour ajouter une photo
     * @return void
     */
    public function insertPicture()
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $csrf_token = $this->generateCsrfToken();
        $this->show('pictures/picturesForm', ['csrf_token' => $csrf_token]);
    }

    /**
     * Méthode qui renvoie vers le formulaire de modification d'une photo
     * @return void
     */
    public function updatePicture($param) 
    {
        $this->checkAutorization(['admin', 'catalog-manager']);
        $picturesModel = new Pictures;
        $currentPicture = $picturesModel->findId($param);
        $csrf_token = $this->generateCsrfToken();
        $this->show('pictures/picturesForm', ['currentPicture'=>$currentPicture, 'csrf_token' => $csrf_token]);
    }

    /**
     * Méthode qui insère une nouvelle photo
     * @return void
     */

    public function insertPicturePost()
    {
        $titleValue = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $pictureValue = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $categoryValue = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

        $errorList = [];
    
        if(empty($titleValue))
        {
            $errorList[] = 'Le titre est vide';
        }

        if(empty($pictureValue))
        {
            $errorList[] = 'L\'emplacement est vide';
        }

        if(empty($categoryValue))
        {
            $errorList[] = 'La catégorie est vide';
        }

        if(!empty($errorList))
        {
        $this->show('main/gestion',
        ['errorList'=> $errorList, 
        'titleValue'=>$titleValue,
        'pictureValue'=>$pictureValue,
        'categoryValue'=>$categoryValue
        ]);
        }
        else
        {
        $picturesModel = new Pictures;
        $picturesModel->setTitle($titleValue);
        $picturesModel->setPicture($pictureValue);
        $picturesModel->setCategory($categoryValue);
    
        $saved = $picturesModel->insert();
        }

        if($saved)
        {
            echo 'L\'insertion a bien été effectuée';
            $this->show('main/gestion', ['picturesModel'=>$picturesModel]);
        }
        else
        {
            $errorList[] = 'Une erreur est survenue, merci de réessayer';
    
            $this->show('pictures/picturesForm', ['picturesModel'=>$picturesModel,'errorList'=>$errorList]);
        }
    }


    /**
     * Méthode qui met à jour une nouvelle photo
     * @return void
     */

    public function updatePicturePost($param)
    {
        $titleValue = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $pictureValue = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $categoryValue = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

        $errorList = [];
    
        if(empty($titleValue))
        {
            $errorList[] = 'Le titre est vide';
        }

        if(empty($pictureValue))
        {
            $errorList[] = 'L\'emplacement est vide';
        }

        if(empty($categoryValue))
        {
            $errorList[] = 'La catégorie est vide';
        }

        if(!empty($errorList))
        {
        $this->show('main/gestion',
        ['errorList'=> $errorList, 
        'titleValue'=>$titleValue,
        'pictureValue'=>$pictureValue,
        'categoryValue'=>$categoryValue
        ]);
        }
        else
        {
        $picturesModel = new Pictures;
        $currentPicture = $picturesModel->findId($param);

        $currentPicture->setTitle($titleValue);
        $currentPicture->setPicture($pictureValue);
        $currentPicture->setCategory($categoryValue);
    
        $saved = $currentPicture->update();
        }

        if($saved)
        {
            echo 'La modification a bien été effectuée';
            $this->show('main/gestion', ['currentPicture'=>$currentPicture]);
        }
        else
        {
            $errorList[] = 'Une erreur est survenue, merci de réessayer';
    
            $this->show('pictures/picturesForm', ['currentPicture'=>$currentPicture,'errorList'=>$errorList]);
        }
    }

    /**
     * Méthode qui permet de supprimer une photo
     * @return void
     */
    public function deletePicturePost($param)
    {
        $titleValue = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $pictureValue = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
        $categoryValue = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

        $errorList = [];
    
        if(empty($titleValue))
        {
            $errorList[] = 'Le titre est vide';
        }

        if(empty($pictureValue))
        {
            $errorList[] = 'L\'emplacement est vide';
        }

        if(empty($categoryValue))
        {
            $errorList[] = 'La catégorie est vide';
        }

        if(!empty($errorList))
        {
        $this->show('main/gestion',
        ['errorList'=> $errorList, 
        'titleValue'=>$titleValue,
        'pictureValue'=>$pictureValue,
        'categoryValue'=>$categoryValue
        ]);
        }
        else
        {
        $picturesModel = new Pictures;
        $currentPicture = $picturesModel->findId($param);

        $currentPicture->setTitle($titleValue);
        $currentPicture->setPicture($pictureValue);
        $currentPicture->setCategory($categoryValue);
    
        $deleted = $currentPicture->delete();
        }

        if($deleted)
        {
            $welcome = 'La modification a bien été effectuée';
            $this->show('pictures/picturesForm', ['currentPicture'=>$currentPicture,'welcome'=> $welcome]);
        }
        else
        {
            $errorList[] = 'Une erreur est survenue, merci de réessayer';
    
            $this->show('pictures/picturesForm', ['currentPicture'=>$currentPicture,'errorList'=>$errorList]);
        }
    }
}


?>


