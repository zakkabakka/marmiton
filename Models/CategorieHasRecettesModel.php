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
        return "INSERT INTO categorie_has_recettes(id_categorie, id_recette) VALUES (:id_categorie, :id_recette)";
    }
    public function getCategorie()
    {
        $db = AbstractModel::getBD();
        $sql = "SELECT * FROM categorie";
        $categorie = $db->prepare($sql);
        $categorie->execute();
        $categorie = $categorie->fetchAll(\PDO::FETCH_ASSOC);
        //var_dump($categorie);
        return $categorie;
    }

    public function addCategorieRecette($categorieData)
    {
        //var_dump($categorieData);
        return $this->insert($categorieData);

    }
}