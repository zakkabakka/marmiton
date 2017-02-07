<?php

namespace Marmiton\Models;

use Marmiton\Core\AbstractModel;

/**
*
*/
class UserModel extends AbstractModel
{
    protected function defineTable()
    {
        $this->table = 'users';
    }

    protected function getInsertSqlStatement()
    {
        return "INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)";
    }

    // public function addUser($userData)
    // {
    //     $db = $this->getBD();

    //     $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
    //     $add->execute(array(

    //         "pseudo" => $userData['pseudo'],
    //         "email" => $userData['email']
    //     ));

    //     return $db->lastInsertId();
    // }

    public function addUSer($userData)
    {
        $this->insert($userData);
    }
}