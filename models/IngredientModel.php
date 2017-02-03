<?php

namespace Marmiton\models;

use Marmiton\Core\Models;

/**
* 
*/
class IngredientModel extends Models
{
    public function getBD()
    {
         $db = Models::Connection();
         return $this->db;
    }

    public function checkIngredient($ingredientData)
    {
        //check si le nouveau ingredient existe dans la table//
    }

    public function addIngredient($ingredientData)
    {
        $db = $this->getBD();
        $add = $db->prepare("INSERT INTO ingredients(nom) VALUES (:nom)");

        $add->execute(array(
            "nom" => $ingredientData['ingredient']
        ));
        return $db->lastInsertId();
    }

    public function addQuantite($ingredientData)
    {
        $db = $this->getBD();
        // var_dump($ingredientData);

        $add = $db->prepare("INSERT INTO recette_has_ingredients(recette_id, ingredients_id, mesure_id, quantite) 
                             VALUES (:recette_id, :ingredients_id, :mesure_id, :quantite)");
        
        $add->execute(array(
            "recette_id" => $ingredientData['recette_id'],
            "ingredients_id" => $ingredientData['id_ingredient'],
            "mesure_id" => $ingredientData['recette_id'],
            "quantite" => $ingredientData['quantite']
        ));
    }
}