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
        "SELECT * FROM mesures"; //faut mettre le
    }
    
    public function getSearchRecetteParNom($searchParNom)
    {
        $db = AbstractModel::getBD();

        $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure
                    FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h
                    where c.nom_recette LIKE '%". $searchParNom ."%' 
                    and c.id_recette = b.recette_id
                    and c.id_user = e.id_user
                    and b.ingredients_id = d.id_ingredient
                    and b.mesure_id = h.mesure_id
                    and c.id_recette=f.id_recette
                    and f.id_categorie = g.id_categorie";

        $querySearchParNom = $db->prepare($sql);
        $querySearchParNom->execute();
        $getRecetteSearchParNom = $querySearchParNom->fetchAll(\PDO::FETCH_ASSOC);

        return $getRecetteSearchParNom;
    
    }

    public function getSearchRecetteParIngredients($searchParIngred)
    {
        $db = AbstractModel::getBD();

        $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure
                    FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h
                    where d.nom LIKE '%". $searchParIngred ."%' 
                    and c.id_recette = b.recette_id
                    and c.id_user = e.id_user
                    and b.ingredients_id = d.id_ingredient
                    and b.mesure_id = h.mesure_id
                    and c.id_recette=f.id_recette
                    and f.id_categorie = g.id_categorie";

        $querySearchParIngredients = $db->prepare($sql);
        $querySearchParIngredients->execute();
        $getRecetteSearchParIngredients = $querySearchParIngredients->fetchAll(\PDO::FETCH_ASSOC);

        return $getRecetteSearchParIngredients;
    
    }

    public function getSearchRecetteParCategorie($searchParCateg)
    {
        $db = AbstractModel::getBD();

        $sql = "SELECT c.id_recette, c.nom_recette, e.pseudo, g.categorie, d.nom, b.quantite, h.mesure
                    FROM recette_has_ingredients b, recette c, ingredients d, users e, categorie_has_recettes f, categorie g, mesures h
                    where d.categorie LIKE '%". $searchParCateg ."%' 
                    and c.id_recette = b.recette_id
                    and c.id_user = e.id_user
                    and b.ingredients_id = d.id_ingredient
                    and b.mesure_id = h.mesure_id
                    and c.id_recette=f.id_recette
                    and f.id_categorie = g.id_categorie";

        $querySearchParCategorie = $db->prepare($sql);
        $querySearchParCategorie->execute();
        $getRecetteSearchParCategorie = $querySearchParCategorie->fetchAll(\PDO::FETCH_ASSOC);

        return $getRecetteSearchParCategorie;
    
    }
}