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
        $allRecettes = [];
        foreach ($recettes as $recette) {

            $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure
                    FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h
                    where c.id_recette='". $recette['id_recette'] ."' 
                    and c.id_recette = b.recette_id
                    and c.id_user = e.id_user
                    and b.ingredients_id = d.id_ingredient
                    and b.mesure_id = h.mesure_id
                    and c.id_recette=f.id_recette
                    and f.id_categorie = g.id_categorie";

            $all = $db->query($sql);
            array_push($allRecettes, $all->fetchAll(\PDO::FETCH_ASSOC));
            //$allRecettes = ;
        }
        //print_r($allRecettes);
        return $allRecettes;
    }

    // Requete qui recupere tout ::::
    // SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure, j.etape, j.contenu
    // FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h, etape_has_recette i, etapeRecette j
        
    //     where c.id_recette='4' 
    //     and c.id_recette=b.recette_id
    //     and b.ingredients_id=d.id_ingredient
    //     and b.mesure_id=h.mesure_id
    //     and c.id_recette=f.id_recette
    //     and f.id_categorie=g.id_categorie
    //     and j.id_etape = i.id_etape
    //     and c.id_recette=i.id_recette
    //     ;



}
