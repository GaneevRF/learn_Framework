<?php

namespace Engine\Core\Database;

use PDO;
use PDOException;

class Connection
{
    public $db;

    public function connect($config = array()){
        $dsn = 'mysql:dbname=' .$config['db_name'] .';host=' . $config['host'];

        try{
            $this->db = new PDO($dsn, $config['username'], $config['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        }
        catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function add($query, $param = array()){
        $sth = $this->db->prepare($query);

        return $sth->execute($param) ? $this->db->lastInsertId() : 0;
    }

    public function set($query, $param = array()){
        $sth = $this->db->prepare($query);
        return $sth->execute((array) $param);
    }

    public function getRow($query, $param = array()){
        $sth = $this->db->prepare($query);
        $sth->execute((array)$param);

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($query, $param = array()){
        $sth = $this->db->prepare($query);
        $sth->execute((array)$param);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getValue($query, $param = array(), $default = null){
        $result = $this->getRow($query, $param);
        if(!empty($result)){
            $result = array_shift($result);
        }

        return (empty($result)) ? $default : $result;
    }

    public function getColumn($query, $param = array()){
        $sth = $this->db->prepare($query);
        $sth->execute((array)$param);

        return $sth->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getDb()
    {
        return $this->db;
    }

}