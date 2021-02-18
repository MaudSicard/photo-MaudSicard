<?php

namespace App\Models;
use App\Utils\Database;
use PDO;

/* Mémo : 
Classe mère de tous les Models
On centralise ici toutes les propriétés et méthodes utiles pour TOUT les Models

Une classe abstraite ne peux pas être instanciée 
Elle sert juste de base à des classes enfant.
Dans une classe abstraite on va pouvoir indiquer 
les methodes que les enfants doivent implementer.
S'ils ne les implémentent pas, ceux ne sont pas ses enfants
*/


abstract class CoreModel {

    abstract public function find($id);
    abstract public function insert();
    abstract public function update();
    abstract public function delete();


    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */

    protected $create;

    /**
     * @var string
     */
    protected $update;

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of create
     *
     * @return  string
     */ 
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * Get the value of update
     *
     * @return  string
     */ 
    public function getUpdate()
    {
        return $this->update;
    }
    
}

?>