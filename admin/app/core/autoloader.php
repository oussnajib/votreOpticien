<?php

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class) {

            $folders = [
                __DIR__ . "/../config/",
                __DIR__ . "/../core/",
                __DIR__ . "/../controllers/",
                __DIR__ . "/../models/",
                __DIR__ . "/../dao/",
                __DIR__ . "/../helpers/"
            ];

            foreach ($folders as $folder) {

                $file = $folder . $class . ".php";

                if (file_exists($file)) {
                    require_once $file;
                    return;
                }
            }
        });
    }
}
//L'autoloader chargera automatiquement Controller et AdminDAO.