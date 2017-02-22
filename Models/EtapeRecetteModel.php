<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;
/**
* CrudModel class
*/
class EtapeRecetteModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'etapeRecette';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO etapeRecette(etape, contenu) VALUES (:etape, :contenu)";
    }

    public function addEtapeRecette($etapeRecetteData)
    {
        return $this->insert($etapeRecetteData);
    }
}
