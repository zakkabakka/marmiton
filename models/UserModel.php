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
        $db = $this->getBD();

        $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
        $add->execute(array(
        
            "pseudo" => $userData['pseudo'],
            "email" => $userData['email']
        ));
        
        return $db->lastInsertId();
    }
}