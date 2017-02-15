<?php

namespace Marmiton\Controller;
// use Models\Crud;
use Marmiton\Core\AbstractController;
use Marmiton\Models\RecetteHasIngredientsModel;

class AccueilController extends AbstractController
{
    public function defaultAction()
    {
        echo "Default Example Page\n";
    }
    public function indexAction()
    {
        $recettes = new RecetteHasIngredientsModel;
        $recette = $recettes->getRecettes();
        var_dump($recette);
        $this->render('accueil');
    }

    public function getRecette()
    {
        $recettes = new RecetteHasIngredientsModel;
        $recette = $recettes->getRecettes();
        var_dump($recette);
    }

}