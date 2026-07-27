<?php

$router->get('/', [AuthController::class, 'index']);
$router->get('/login', [AuthController::class, 'index']);

?>