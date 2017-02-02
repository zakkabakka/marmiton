<?php

namespace Marmiton\models;

use Marmiton\Core\Models;

/**
* 
*/
class UserModel extends Models
{
    public function getBD()
    {
         $db = Models::Connection();
         return $this->db;
    }

    public function addUser($userData)
    {
        // var_dump($userData['user']['pseudo']);
        $db = $this->getBD();

        $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
        $add->execute(array(
        
            "pseudo" => $userData['user']['pseudo'],
            "email" => $userData['user']['email']
        ));
        // return $userData['user']['email'];
    }

    public function getIdUser()
    {
        $db = $this->getBD();
        $email = $this->addUser();

        $getIdUser = $db->query("SELECT id_user FROM users WHERE email = '".$email."'");
        $getIdUser->execute();
        $IdUser = $getIdUser->fetchAll(PDO::FETCH_COLUMN);
        var_dump($IdUser);
    }
}