<?php

$router->get('/', [AuthController::class, 'index']);

$router->get('/login', [AuthController::class, 'index']);

$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/dashboard', [DashboardController::class, 'index']);

$router->get('/appointments', [AppointmentController::class, 'index']);

$router->get('/appointments/show', [AppointmentController::class, 'show']);

$router->get('/appointments/edit', [AppointmentController::class, 'edit']);

$router->post('/appointments/update', [AppointmentController::class, 'update']);

$router->get('/appointments/delete', [AppointmentController::class, 'delete']);

$router->get('/products', [ProductController::class, 'index']);

$router->get('/products/create', [ProductController::class, 'create']);

$router->post('/products/store', [ProductController::class, 'store']);

$router->get('/products/edit', [ProductController::class, 'edit']);

$router->post('/products/update', [ProductController::class, 'update']);

$router->get('/products/delete', [ProductController::class, 'delete']);
?>