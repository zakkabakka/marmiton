<?php

namespace Marmiton\Core;

/**
* model class
*/
abstract class AbstractModel
{
    protected $db;
    protected $table;

    /** @return string */
    abstract protected function defineTable();

    /** @return string */
    abstract protected function getInsertSqlStatement();

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
       $this->defineTable();
    }

    public function getBD()
    {
        $db = Models::Connection();
        return $this->db;
    }

    public function getTable()
    {
        if (!isset($this->table)) {
            $this->defineTable();
        }

        return $this->table;
    }

    /**
     * [insert description]
     * @param  array $data = ['pseudo' => $value, 'email' => $value]
     * @return [type]       [description]
     */
    public function insert($data)
    {
        $db = $this->getBD();

        $sql = $this->getInsertSqlStatement();
        $add = $db->prepare($sql);
        $add->execute($data);

        return $db->lastInsertId();
    }

    protected function complicatedInsert($data)
    {
        $add = $db->prepare("INSERT INTO users(pseudo, email) VALUES (:pseudo, :email)");
        $fields = "(" . implode(", ", array_keys($data)) . ")";
        $add_colon_before_string = function($str){return ":".$str;};
        $fields_vars = "(" . implode(", ", array_map($add_colon_before_string, array_keys($data)) ) . ")";

        $sql = "INSERT INTO ".$this->getTable().$fields." VALUES ".$fields_vars;
        $add = $db->prepare($sql);
        $add->execute($data);

        return $db->lastInsertId();

    }
}
