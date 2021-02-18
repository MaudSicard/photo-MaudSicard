<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

class Category extends CoreModel
{
    /**
     * 
     * @var string
     */
    protected $name;
    
    /**
     * Get the value of name
     *
     * @param  string  $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Méthode permettant d'ajouter un enregistrement dans la table category
     * L'objet courant doit contenir toutes les données à ajouter : 1 propriété => 1 colonne dans la table
     * 
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "
            INSERT INTO `category` (`name`, `create`)
            VALUES (:name, NOW())
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        
        $inserted = $pdoStatement->execute();

        if ($inserted) {
           
            $this->id = $pdo->lastInsertId();

            return true;
        }
    }

    /**
     * Méthode permettant de mettre à jour un enregistrement dans la table category
     * L'objet courant doit contenir l'id, et toutes les données à ajouter : 1 propriété => 1 colonne dans la table
     * 
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `category`
            SET
                `name` = :name,
                `update` = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        
        $updated = $pdoStatement->execute();

        return $updated;
    }


    /**
     * Méthode permettant de supprimer un enregistrement dans la table category
     * 
     * @return bool
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "
            DELETE FROM `category`
            WHERE name = :name
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $this->name, PDO::PARAM_STR);

        $query->execute();
        
        return $query;
    }


    /**
     * Méthode qui récupère l'ensemble des éléments relatif à une requête portant sur le nom de la catégorie
     * 
     * @param string $category
     * @return object
     */
    public function find($name)
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM `category`
            WHERE name = :name';

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $name, PDO::PARAM_STR);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchObject(self::class);
        
        return $results;
    }

    /**
     * Méthode qui récupère l'ensemble des éléments de la table category dans un objet
     * @return object
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `category`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }
}

?>