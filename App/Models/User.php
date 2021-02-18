<?php
namespace App\Models;

use App\Utils\Database;
use PDO;

class User extends CoreModel {

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $role;

    /**
     * @var string
     */
    private $statut;

    /**
     * Méthode permettant la récupération de tout les users
     * @return object
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `user`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class); 
        
        return $results;
    }
    
    /**
     * Récupérer un utilisateur via son mail
     * @return object
     */
    public function find($mail)
    {
        $pdo = Database::getPDO();

        $sql = "
            SELECT *
            FROM `user`
            WHERE mail = :mail
        ";

        $pdoStatement = $pdo->prepare($sql);
        
        $pdoStatement->execute([':mail' => $mail, ]);

        $result = $pdoStatement->fetchObject(self::class);

        return $result;
    }

    /**
     * Récupérer un utilisateur via son password
     * @return object
     */
    public function findPassword($password) 
  {
    $pdo = Database::getPDO();

    $sql = "
        SELECT *
        FROM `user`
        WHERE `password` = :password";

    $pdoStatement = $pdo->prepare($sql);

    $pdoStatement->bindValue(':password',  password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);

    $connected = $pdoStatement->execute();
    
    return $connected;
  }

    /**
     * Méthode permettant la création d'un user 
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO `user` (`mail`, `firstname`, `lastname`, `password`, `create`, `statut`,`role`)
            VALUES (:mail, :firstname, :lastname, :password, NOW(), :role, :statut)
        ;";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $pdoStatement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':statut', $this->statut, PDO::PARAM_STR);
        $pdoStatement->bindValue(':role', $this->role, PDO::PARAM_STR);

        $createdRows = $pdoStatement->execute();

        if ($createdRows > 0) {
            $this->id = $pdo->lastInsertId();

            return true;
        } 
        else 
        {
            return false;
        }
    }

    /**
     * Méthode permettant la mise à jour dans la table user
     */
    public function update()
    {
       
    }

    /**
     * Méthode permettant la suppression dans la table user
     */
    public function delete()
    {
        
    }

    /**
     * Get the value of mail
     *
     * @return  string
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @param  string  $mail
     */ 
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     */ 
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of firstname
     *
     * @return  string
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param  string  $firstname
     */ 
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get the value of lastname
     *
     * @return  string
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  string  $lastname
     */ 
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get the value of role
     *
     * @return  string
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param  string  $role
     */ 
    public function setRole(string $role)
    {
        $this->role = $role;
    }

    /**
     * Get the value of statut
     *
     * @return  string
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @param  string  $statut
     */ 
    public function setStatut(string $statut)
    {
        $this->statut = $statut;
    }
}