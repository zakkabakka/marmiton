<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class MesureModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'mesures';
    }

    protected function getInsertSqlStatement()
    {
        return "SELECT * FROM mesures";
    }
    
    public function getAll()
    {

        $db = AbstractModel::getBD();
        $sql = "SELECT * FROM mesures";
        $mesure = $db->prepare($sql);
        $mesure->execute();
        $mesures = $mesure->fetchAll(\PDO::FETCH_ASSOC);

        return $mesures;
    }
}