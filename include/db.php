<?php

class DB
{
    private static $instance;
    public static function getInstance()
    {
        if(self::$instance != null){
            return self::$instance;
        }
        self::$instance = new PDO("mysql:host=localhost;dbname=projeto_biblioteca", "root", "");
    }
}

DB::getInstance();
