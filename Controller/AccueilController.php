<?php

namespace Marmiton\Controller;
// use Models\Crud;
use Marmiton\Core\Controller;


class AccueilController extends Controller
{
    
    function indexAction()
    {   
        $this->render('accueil');
    }

}