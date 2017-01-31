<?php

namespace Marmiton\Controller;
// use Models\Crud;
use Marmiton\Core\AbstractController;


class AccueilController extends AbstractController
{
    public function defaultAction()
    {
        echo "Default Example Page\n";
    }

    public function indexAction()
    {   
        $this->render('accueil');
    }

}