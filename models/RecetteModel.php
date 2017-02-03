<?php

namespace Marmiton\models;

use Marmiton\Core\Models;
/**
* CrudModel class
*/
class RecetteModel extends Models
{
    public function getBD()
    {
        $db = Models::Connection();
        return $this->db;
    }

    public function addRecette($recetteData) 
    {

        $db = $this->getBD();
        
        $db = $this->getBD();
        $add = $db->prepare("INSERT INTO recette(nom_recette, id_user) VALUES (:nom, :id_user)");
        $add->execute(array(
            "nom" => $recetteData['nom'],
            "id_user" => $recetteData['id_user']
        ));
        return $db->lastInsertId();
    }



}
