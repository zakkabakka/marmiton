<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class RecetteHasIngredientsModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'recette_has_ingredients';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO recette_has_ingredients(recette_id, ingredients_id, mesure_id, quantite)
                             VALUES (:recette_id, :ingredients_id, :mesure_id, :quantite)";
    }

    public function addQuantite($QuantiteData)
    {
        //var_dump($QuantiteData);
        return $this->insert($QuantiteData);
        // $db = $this->getBD();
        // // var_dump($ingredientData);

        // $add = $db->prepare("");

        // $add->execute(array(
        //     "recette_id" => $ingredientData['recette_id'],
        //     "ingredients_id" => $ingredientData['id_ingredient'],
        //     "mesure_id" => $ingredientData['recette_id'],
        //     "quantite" => $ingredientData['quantite']
        // ));
    }

}