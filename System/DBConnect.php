<?php

class DBConnect extends MySQLi
{
    private static $instance;
    
    public static function getConnect()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
    
    private function __construct()
    {
        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        parent::set_charset('utf8');

        if ($this->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    private function __clone()
    {
    }
}