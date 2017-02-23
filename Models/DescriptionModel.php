<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class DescriptionModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'mesures';
    }

    protected function getInsertSqlStatement()
    {
        return "SELECT * FROM mesures";
    }
    
    public function getRecetteID($id)
    {

        $db = AbstractModel::getBD();

        $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure
                FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h
                where c.id_recette='". $id ."' 
                and c.id_recette = b.recette_id
                and c.id_user = e.id_user
                and b.ingredients_id = d.id_ingredient
                and b.mesure_id = h.mesure_id
                and c.id_recette=f.id_recette
                and f.id_categorie = g.id_categorie";

        $all = $db->query($sql);
        $allRecettes = $all->fetchAll(\PDO::FETCH_ASSOC);
            //$allRecettes = ;
        //print_r($allRecettes);

        return $allRecettes;
    }

    public function getEtapeID($id)
    {

        $db = AbstractModel::getBD();

        $sql = "SELECT *
                FROM etaperecette a, etape_has_recette b
                where b.id_recette='". $id ."' 
                and b.id_etape = a.id_etape";

        $etape = $db->query($sql);
        $etapeRecette = $etape->fetchAll(\PDO::FETCH_ASSOC);

        return $etapeRecette;
    }



}