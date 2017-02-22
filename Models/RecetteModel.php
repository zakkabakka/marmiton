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
    }

    public function getRecettes()
    {
        $db = AbstractModel::getBD();

        $sql = "SELECT * FROM recette";
        $recette = $db->query($sql);
        $recettes = $recette->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($recettes as $recette) {

            $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure, j.etape, j.contenu
                    FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h, etape_has_recette i, etapeRecette j
                    where c.id_recette='". $recette['id_recette'] ."' 
                    and c.id_recette = b.recette_id
                    and b.ingredients_id = d.id_ingredient
                    and b.mesure_id = h.mesure_id
                    and f.id_categorie = g.id_categorie
                    and j.id_etape = i.id_etape";

            $all = $db->query($sql);
            $allRecettes = $all->fetchAll(\PDO::FETCH_ASSOC);
        }
        //print_r($allRecettes);
        return $allRecettes;
    }



}
