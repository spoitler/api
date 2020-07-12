<?php

class Dao {
    private static $_instance = null;
    public $db;

    private function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new Dao();
        }
        
        return self::$_instance;
    }
}
