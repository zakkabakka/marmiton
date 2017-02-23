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
        $this->table = 'etaperecette';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO etaperecette(etape, contenu) VALUES (:etape, :contenu)";
    }

    public function addEtapeRecette($etapeRecetteData)
    {
        return $this->insert($etapeRecetteData);
    }
}
