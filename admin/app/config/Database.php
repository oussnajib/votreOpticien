<?php

class Database
{
    /**
     * Instance unique de la classe
     */
    private static ?Database $instance = null;

    /**
     * Connexion PDO
     */
    private PDO $connection;

    /**
     * Informations de connexion
     */
    private string $host = "localhost";
    private string $dbname = "votreopticien";
    private string $username = "root";
    private string $password = "";
    private string $charset = "utf8mb4";

    /**
     * Constructeur privé
     */
    private function __construct()
    {
        try {

            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

            $this->connection = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );

        } catch (PDOException $e) {

            die("Erreur de connexion : " . $e->getMessage());

        }
    }

    /**
     * Retourne l'unique instance
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    /**
     * Retourne la connexion PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}