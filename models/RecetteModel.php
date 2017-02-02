<?php

namespace Marmiton\models;

use Marmiton\Core\Models;
/**
* CrudModel class
*/
class RecetteModel extends Models
{
    public function addRecette($data) 
    {
        var_dump($data);
        $ingredient = [];
        $quantite = [];
        echo $_POST["quantite". 0];
        for ($i=0; isset($_POST["ingredient". $i]); $i++) {
        	array_push($ingredient, $_POST["ingredient". $i]);
        }
        for ($j=0; isset($_POST["quantite". $j]); $j++) {
            array_push($quantite, $_POST["quantite". $j]);
        }
        print_r($ingredient);
        print_r($quantite);
        // $db = Models::Connection();
        // var_dump($_POST);
        // $db->
    }
}
