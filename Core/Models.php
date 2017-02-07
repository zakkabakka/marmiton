<?php

namespace Marmiton\Core;

/**
* model class
*/
class Models
{
    // protected $db;

    public function Connection()
    {
        $user = DB_USER;
        $passwd = DB_PASSWD;
        $host_db = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
        $conn = NULL;

        try{
                $conn = new \PDO($host_db, $user, $passwd);
                // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){
                    echo 'ERROR: ' . $e->getMessage();
                }

        return $this->db = $conn;
    }

    public function __construct()
    {
       $this->Connection();

    }
}
