<?php

class Auth
{
    /**
     * Vérifie si un administrateur est connecté
     */
    public static function check(): void
    {
        if (!Session::has('admin_id')) {
            header('Location: index.php?url=login');
            exit;
        }
    }
}