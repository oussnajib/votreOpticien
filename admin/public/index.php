<?php

require_once "../app/core/Autoloader.php";

Autoloader::register();

Session::start();

$router = new Router();

require_once "../routes/web.php";

$url = $_GET['url'] ?? '';

if ($url === '') {
    $uri = '/';
} else {
    $uri = '/' . trim($url, '/');
}
if ($uri === "") {
    $uri = "/";
}

$router->dispatch($uri, $_SERVER['REQUEST_METHOD']);
