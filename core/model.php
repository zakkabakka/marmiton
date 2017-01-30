<?php

namespace Marmiton\Core;



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
}