<?php

class Database
{
    private static $instance = null;
    private $connection;

    public function __construct()
    {

        $host = config('database.host');
        $db_name = config('database.database');
        $username = config('database.username');
        $password = config('database.password');
        $port = config('database.port');
        $charset = config('database.charset');

        $dsn =  "mysql:host={$host};dbname={$db_name};charset={$charset};port={$port}";

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DATABASE FAILED TO CONNECT: " . $e->getMessage());
        }
    }

    public static function get_instance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function get_connection()
    {
        return $this->connection;
    }

    public function __clone() {}
    public function __wakeup() {}
}
