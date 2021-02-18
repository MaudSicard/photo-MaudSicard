<?php

namespace App\Controllers;
use App\Models\Pictures;
use App\Models\Category;
use App\Models\User;

class UserController extends CoreController 
{
    /**
     * Méthode qui appelle la page de login
     * @return void
     */
    public function login()
    {
        $user = new User;
        $this->show('user/login', ['user'=> $user]);
    }

    /**
     * Méthode qui connecte un user à la base
     * @return void
     */
    public function loginPost()
    {
        $mailValue = filter_input(INPUT_POST, 'mail');
        $passwordValue = filter_input(INPUT_POST, 'password');
    
        $userModel = new User;
        
        if(($userModel->find($mailValue)) && ($userModel->findPassword($passwordValue)))
        {
            $userModel = new User;
            $user = $userModel->find($mailValue);
            $welcome ='Bienvenue dans votre espace personnel !';
            $this->show('user/login', ['user'=>$user, 'welcome'=> $welcome]);
            $_SESSION['userId'] = $user->getId();
            $_SESSION['userObject'] = $user;   
        }
        else 
        {
           $errorList = ['Vous n\'êtes pas enregitré dans la base de données'];
           $this->show('error/errorForm',
                ['errorList'=> $errorList]);
        }
    }

    /**
     * Méthode qui appelle la page de création d'un nouveau user
     * @return void
     */
    public function newUser()
    {
        $this->checkAutorization(['admin']);
        $user = new User;
        $csrf_token = $this->generateCsrfToken();
        $this->show('user/newUser', ['user'=> $user, 'csrf_token' => $csrf_token]);
    }

    /**
     * Méthode qui insère un nouveau user dans la base
     * @return void
     */
    public function newUserPost()
    {
      $mailValue = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING);
      $firstnameValue = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
      $lastnameValue = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
      $passwordValue = filter_input(INPUT_POST, 'password');
      $roleValue = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
      $statutValue = filter_input(INPUT_POST, 'statut', FILTER_SANITIZE_STRING);
    
      $errorList = [];
    
      if(empty($mailValue))
      {
        $errorList[] = 'L\'adresse mail est vide';
      }
    
      if(empty($firstnameValue))
      {
        $errorList[] = 'Le prénom est vide';
      }
    
     if(empty($lastnameValue))
      {
        $errorList[] = 'Le nom est vide';
      }
    
      if(empty($passwordValue))
      {
        $errorList[] = 'Le mot de passe est vide';
      }

      if(empty($roleValue))
      {
        $errorList[] = 'Le rôle est vide';
      }

      if(empty($statutValue))
      {
        $errorList[] = 'Le statut est vide';
      }
    
      if(!empty($errorList))
         {
          $this->show('user/newUser',
          ['errorList'=> $errorList, 
            'mailValue'=>$mailValue,
            'firstnameValue'=> $firstnameValue,
            'lastname'=> $lastnameValue,
            'passwordValue'=>$passwordValue,
            'roleValue'=>$roleValue,
            'statutValue'=>$statutValue
          ]);
          }
          else
          {
            $user = new User;
            $user->setMail($mailValue);
            $user->setFirstname($firstnameValue);
            $user->setLastname($lastnameValue);
            $user->setPassword(password_hash($passwordValue,PASSWORD_DEFAULT));
            $user->setRole($roleValue);
            $user->setStatut($statutValue);
                
            $inserted = $user->insert();
                
            if ($inserted) 
            {
              $welcome ='Vous pouvez entrer dans votre espace personnel !';
              $this->show('user/login', ['user'=>$user, 'welcome'=> $welcome]);
            } 
            else 
            {
              $errorList[] = 'Une erreur est survenue à l\'insertion, merci de réessayer';
    
              $this->show(
              'user/newUser',
              ['errorList'=> $errorList, 
              'mailValue'=>$mailValue,
              'firstnameValue'=> $firstnameValue,
              'lastname'=> $lastnameValue,
              'passwordValue'=>$passwordValue,
              'roleValue'=>$roleValue,
              'statutValue'=>$statutValue,
              'user'=>$user,
              ]);
            }
          }
    }
}


?>





