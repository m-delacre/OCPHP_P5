<?php

class DatabaseConnection
{
    public ?PDO $database = null;
    private static $instance;

    private function __construct()
    {
        $this->database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME  . ';charset=utf8', DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new DatabaseConnection();
        }
    }

    public function getConnection(): PDO
    {
        if($this->database === null)
        {
            $this->database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME  . ';charset=utf8', DB_USER, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        return $this->database;
    }
}
