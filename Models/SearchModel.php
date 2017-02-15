<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class SearchModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'recette';
    }

    protected function getInsertSqlStatement()
    {
        return "SELECT * FROM mesures"; //faut mettre le
    }
    
    public function getAll()
    {

        $db = AbstractModel::getBD();
        $sql = "SELECT * FROM mesures";
        $mesure = $db->prepare($sql);
        $mesure->execute();
        $mesures = $mesure->fetchAll(\PDO::FETCH_ASSOC);
        // var_dump($mesures);
        return $mesures;
    
    }
}