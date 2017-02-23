<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Models\SearchModel;

class SearchController extends AbstractController
{
    public function defaultAction()
    {
        echo "Default Example Page\n";
    }

    public function recetteAction()
    {
        $searchRecette = new SearchModel;
        $getSearchRecetteParNom = $searchRecette->getSearchRecetteParNom($_POST['search']);
        $getSearchRecetteParIngredients = $searchRecette->getSearchRecetteParIngredients($_POST['search']);
        $getSearchRecetteParCategorie = $searchRecette->getSearchRecetteParCategorie($_POST['search']);


        var_dump($getSearchRecetteParNom);
        var_dump($getSearchRecetteParIngredients);
        var_dump($getSearchRecetteParCategorie);

        $d['getSearchRecetteParNom'] = $getSearchRecetteParNom;
        $d['getSearchRecetteParIngredients'] = $getSearchRecetteParIngredients;
        $d['getSearchRecetteParCategorie'] = $getSearchRecetteParCategorie;

        $this->set($d);

        $this->render('resultRecherche');
    }

}