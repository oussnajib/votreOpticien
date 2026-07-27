<?php

require_once "../app/core/Autoloader.php";

Autoloader::register();

$router = new Router();

require_once "../routes/web.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$base = "/stage/votreOpticien/admin/public";

$uri = str_replace($base, "", $uri);

if ($uri === "") {
    $uri = "/";
}

$router->dispatch($uri, $_SERVER['REQUEST_METHOD']);
