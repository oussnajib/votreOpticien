<?php

require_once __DIR__ . '/Database.php';

abstract class DAO
{
    /**
     * Connexion à la base de données
     */
    protected PDO $db;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}