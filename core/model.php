<?php

// namespace Coremodel;

/**
* model class
*/
class Models 
{
    public $dbCon;
    
    public function __construct() 
    {
        $db_auth = array('db_user' => 'root',
                        'db_pass' => 'root',
                         );

        $db_host = 'localhost';

        $this->dbCon = new PDO( "mysql:host=$db_host", $db_auth['db_user'], $db_auth['db_pass']);
        return $this->dbCon;
    }



// $dsn = 'mysql:dbname=testdb;host=127.0.0.1';
// $user = 'dbuser';
// $password = 'dbpass';

// try {
//     $dbh = new PDO($dsn, $user, $password);
// } catch (PDOException $e) {
//     echo 'Connexion échouée : ' . $e->getMessage();
// }
}