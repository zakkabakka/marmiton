<?php

namespace Marmiton\models;

use Marmiton\Core\Models;
/**
* CrudModel class
*/
class RecetteModel extends Models
{
    public function getBD()
    {
        $db = Models::Connection();
        return $this->db;
    }

    public function addRecette($data) 
    {
<<<<<<< HEAD
        $db = $this->getBD();
        // var_dump($data);
        $ingredient = [];
        $quantite = [];

        for ($i=0; isset($_POST["ingredient". $i]); $i++) {
          array_push($ingredient, $_POST["ingredient". $i]);
=======
        var_dump($data);
        $ingredient = [];
        $quantite = [];
        echo $_POST["quantite". 0];
        for ($i=0; isset($_POST["ingredient". $i]); $i++) {
        	array_push($ingredient, $_POST["ingredient". $i]);
>>>>>>> f719cefa223b34aade393ea18012b6832d8fb945
        }
        for ($j=0; isset($_POST["quantite". $j]); $j++) {
            array_push($quantite, $_POST["quantite". $j]);
        }
<<<<<<< HEAD

        //Add User First
        // if (isset($data['user']['pseudo']) && isset($data['user']['email'])) {
            
        //     $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
        //     $add->execute(array(
        
        //     "pseudo" => $data['user']['pseudo'],
        //     "email" => $data['user']['email']
        //     ));
        // }
        // $email = $data['user']['email'];

        // //Get User Id from database for insert recette 
        // $getIdUser = $db->query("SELECT id_user FROM users WHERE email = '".$email."'");
        // $getIdUser->execute();
        // $IdUser = $getIdUser->fetchAll(\PDO::FETCH_COLUMN);

        // //Insert recette
        // if (isset($data['nom']) && isset($data['user']['email'])) {
            
        //     $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
        //     $add->execute(array(
            
        //     "pseudo" => $data['user']['pseudo'],
        //     "email" => $data['user']['email']
        //     ));
        }


        


        

=======
        print_r($ingredient);
        print_r($quantite);
        // $db = Models::Connection();
        // var_dump($_POST);
        // $db->
>>>>>>> f719cefa223b34aade393ea18012b6832d8fb945
    }


}
