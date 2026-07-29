<?php

$router->get('/', [AuthController::class, 'index']);

$router->get('/login', [AuthController::class, 'index']);

$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/dashboard', [DashboardController::class, 'index']);
?>