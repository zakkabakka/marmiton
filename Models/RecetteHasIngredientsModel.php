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
        return $this->insert($QuantiteData);
    }

}