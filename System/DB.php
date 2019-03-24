<?php
require_once 'DBConnect.php';

class DB
{
    private $query;
    private $conn;
    private $params = [];

    public static function query($sql)
    {
        $db = new DB;
        $db->query = $sql;
        $db->conn = DBConnect::getConnect();
        return $db;
    } 

    public function setParams($types, ...$params)
    {
        $this->params[] = $types;
        
        for ($i = 0; $i < count($params); ++$i) {
            $this->params[] = &$params[$i];
        }    
        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    private function prepare()
    {
        $sql = $this->getQuery();

        $stmt = $this->conn->stmt_init();
        $stmt->prepare($sql);
        if (!empty($this->params)) {
            call_user_func_array(array($stmt, 'bind_param'), $this->params);
        }
        return $stmt;
    }

    public function getBool()
    {
        $stmt = $this->prepare();
        return $stmt->execute();
    }

    public function getObjects()
    {
        $stmt = $this->prepare();
        $stmt->execute();
        $result = $stmt->get_result();

        $collection = [];
        while ($obj = $result->fetch_object()) {
            $collection[] = $obj;
        }

        return $collection;
    }

    public function getObject()
    {
        $stmt = $this->prepare();
        $stmt->execute();
        $result = $stmt->get_result();

        if ($obj = $result->fetch_object()) {
            return $obj;
        }

        return null;
    }

    public function getNumrows()
    {
        $stmt = $this->prepare();
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows;
    }

    public function getArray()
    {
        $stmt = $this->prepare();
        $stmt->execute();
        $result = $stmt->get_result();

        if ($array = $result->fetch_array()) {
            return $array;
        }

        return array();
    }

    public function getValue()
    {
        $stmt = $this->prepare();
        $stmt->execute();
        $result = $stmt->get_result();

        if ($array = $result->fetch_array()) {
            return $array[0];
        }

        return null;
    }
}