<?php
namespace Src\System;

class DatabaseConnector {

    private $dbConnection = null;
    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $db   = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];
        $connectionString = "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db";
        echo $connectionString;
        echo $user;
        echo $pass;
        try {
            $this->dbConnection = new \PDO(
                "mysql:host=$host;port=$port;charset=utf8mb4;dbname=$db",
                $user,
                $pass
            );
        } catch (\PDOException $e) {
            exit("Database connection error: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }

}
?>