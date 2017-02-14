<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class CategorieHasRecettesModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'categorie_has_recettes';
    }

    protected function getInsertSqlStatement()
    {
        
    } 
}