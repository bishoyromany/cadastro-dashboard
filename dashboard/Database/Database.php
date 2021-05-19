<?php

namespace App\Database;

$configs = require __DIR__ . "/../configs.php";

class Database
{
    private $host = $configs['DB_SERVER'] ?? "localhost";
    private $db = $configs['DB_NAME'] ?? "dummy";
    private $user = $configs['DB_USERNAME'] ?? "root";
    private $pass = $configs['DB_PASSWORD'] ?? "";
    private $charset = $configs['DB_CHARSET'] ?? null;
    private $opt = NULL;
    private $dsn = NULL;
    private $connection = NULL;
    private static $database = NULL;

    private function __construct()
    {
        $this->createConnection();
    }

    private function createConnection(): void
    {
        $this->charset = "utf8mb4";
        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->opt = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->connection = new \PDO($this->dsn, $this->user, $this->pass, $this->opt);
    }

    static function getInstance(): Database
    {
        if (NULL == self::$database) {
            self::$database = new Database();
        }
        return self::$database;
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
