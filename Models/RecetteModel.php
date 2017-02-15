<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;
/**
* CrudModel class
*/
class RecetteModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'recette';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO recette(nom_recette, id_user) VALUES (:nom, :id_user)";
    }

    public function addRecette($recetteData)
    {
        return $this->insert($recetteData);
        // $db = $this->getBD();

        // $db = $this->getBD();
        // $add = $db->prepare("INSERT INTO recette(nom_recette, id_user) VALUES (:nom, :id_user)");
        // $add->execute(array(
        //     "nom" => $recetteData['nom'],
        //     "id_user" => $recetteData['id_user']
        // ));
        // return $db->lastInsertId();
    }
    public function getRecettes()
    {
        return "SELECT * from recette";
    }



}
