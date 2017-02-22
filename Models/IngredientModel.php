<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class IngredientModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'ingredients';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO ingredients(nom) VALUES (:nom)";
    }

    public function getAllIngredients()
    {
        //check si le nouveau ingredient existe dans la table//
        $db = AbstractModel::getBD();

        $sql = "SELECT * FROM ingredients";
        $ingredientEx = $db->query($sql);
        return $ingredientExiste = $ingredientEx->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function addIngredient($ingredientData)
    {
        return $this->insert($ingredientData);
    }
}