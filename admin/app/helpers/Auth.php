<?php

class Auth
{
    /**
     * Vérifie si un administrateur est connecté
     */
    public static function check(): void
    {
        if (!Session::has('admin')) {
            header('Location: index.php');
            exit;
        }
    }
}