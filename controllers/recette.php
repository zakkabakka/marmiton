<?php

namespace Controllers;

// use Models\Crud;
use \Core\Controller\Controller;

/**
* database 
*/
class recette extends Controller
{
    
    function index()
    {   
        $this->LoadModel('Crud');
        $this->Crud->connexionDB();
        $this->render('index');
    }

}