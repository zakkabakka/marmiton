<?php

// namespace models;

/**
* CrudModel class
*/
class Crud extends Models
{
    public function connexionDB() 
    {

        $db_user = 'root';
        $db_pass = 'root';
        $db_host = 'localhost';

        $db = new PDO( "mysql:host=$db_host", $db_user, $db_pass);
   }
}
