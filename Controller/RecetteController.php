<?php

namespace Marmiton\Controller;

use Marmiton\Core\Controller;

/**
* database 
*/
class RecetteController extends Controller
{
    function indexAction()
    {   
        $this->render('recette');
    }

}