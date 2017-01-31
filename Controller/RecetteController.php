<?php

namespace Marmiton\Controller;

use Marmiton\Core\AbstractController;
use Marmiton\Core\Models;

class RecetteController extends AbstractController
{

    public function ajoutAction()
    {   
        $db = Models::Connection();
        var_dump($db);
        $this->render('recette');
    }

}