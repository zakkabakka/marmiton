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

    public function getAllUsers()
    {
        //check si le nouveau users existe dans la table//
        $db = AbstractModel::getBD();

        $sql = "SELECT * FROM users";
        $usersEx = $db->query($sql);
        return $usersExist = $usersEx->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function addUSer($userData)
    {
        return $this->insert($userData);
    }


}