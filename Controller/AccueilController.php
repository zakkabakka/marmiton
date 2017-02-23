<?php

namespace Marmiton\Controller;
use Marmiton\Core\AbstractController;
use Marmiton\Models\RecetteModel;

class AccueilController extends AbstractController
{
    public function defaultAction()
    {
        echo "Default Example Page\n";
    }

    public function indexAction()
    {
        $recettes = new RecetteModel;
        $recette = $recettes->getRecettes();

        $d['recetteData'] = $recette;
        $this->set($d);
        $this->render('accueil');
    }

}