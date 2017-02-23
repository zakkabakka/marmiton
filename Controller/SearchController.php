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
        //var_dump($_GET['search']);
        //
        $this->render('accueil');
    }

}