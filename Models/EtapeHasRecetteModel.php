<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;
/**
* CrudModel class
*/
class EtapeHasRecetteModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'etape_has_recette';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO etape_has_recette(id_etape, id_recette) VALUES (:id_etape, :id_recette)";
    }

    public function addEtapeHasRecette($etapeHasRecetteData)
    {
        return $this->insert($etapeHasRecetteData);
    }
}
