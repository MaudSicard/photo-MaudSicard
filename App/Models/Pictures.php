<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class Pictures extends CoreModel
{
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $picture;
    /**
     * @var string
     */
    protected $category;

     /**
     * Get the value of title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string  $title
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

      /**
     * Get the value of picture
     *
     * @return  string
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param  string  $picture
     */ 
    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

      /**
     * Get the value of category
     *
     * @return  string
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param  string  $category
     */ 
    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    /**
     * Méthode permettant d'ajouter un enregistrement dans la table pictures
     * L'objet courant doit contenir toutes les données à ajouter : 1 propriété => 1 colonne dans la table
     * 
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO `pictures` (`title`, `picture`, `category`, `create`)
            VALUES (:title, :picture, :category, NOW())
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindValue(':category', $this->category, PDO::PARAM_STR);
        
        $inserted = $pdoStatement->execute();

        if ($inserted) {
            
            $this->id = $pdo->lastInsertId();

            return true;
        }
    }

    /**
     * Méthode permettant de mettre à jour un enregistrement dans la table pictures
     * L'objet courant doit contenir l'id, et toutes les données à ajouter : 1 propriété => 1 colonne dans la table
     * 
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `pictures`
            SET
                `title` = :title,
                `picture` = :picture,
                `category` = :category,
                `update` = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $pdoStatement->bindValue(':category', $this->category, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        
        $updated = $pdoStatement->execute();

        return $updated;
    }


    /**
     * Méthode permettant de spprimer un enregistrement dans la table pictures
     * 
     * @return bool
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "
            DELETE FROM `pictures`
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':id', $this->id, PDO::PARAM_INT);

        $query->execute();

        return $query;
    }


    /**
     * Méthode qui récupère l'ensemble des éléments relatif à une requête portant sur une catégory
     * 
     * @param string $category
     * @return object
     */
    public function find($category)
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM `pictures`
            WHERE category = :category';

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':category', $category, PDO::PARAM_STR);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        
        return $results;
    }

    public function findId($id)
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM `pictures`
            WHERE id = :id';

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $id, PDO::PARAM_STR);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchObject(static::class);
        
        return $results;
    }

    /**
     * Méthode qui récupère l'ensemble des éléments de la table pictures dans un objet
     * @return object
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `pictures`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }
}


?>