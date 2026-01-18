<?php

namespace App\Controllers\Core;
use PDO;
use PDOException;

define('HOST', 'mysql');
define('USERNAME', 'app_user');
define('PASSWORD', 'password');
define('DBNAME', 'app_db');

class Database
{
    private PDO $pdo;
    private static ?Database $instance = null;

    private function __construct()
    {
        try {
            $dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=utf8mb4";
            $this->pdo = new PDO($dsn, USERNAME, PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            die("there is problem with connection" . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database;
        }
        return self::$instance;
    }

    public function getConn(): PDO
    {
        return $this->pdo;
    }
}