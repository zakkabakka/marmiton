<?php

namespace Marmiton\Controller;
// use Models\Crud;
use Marmiton\Core\AbstractController;


class SearchController extends AbstractController
{
    public function defaultAction()
    {
        echo "Default Example Page\n";
    }

    public function recetteAction()
    {
        var_dump($_POST['search']);
        //
        $this->render('accueil');
    }

}