<?php

$router->get('/', [AuthController::class, 'index']);

$router->get('/login', [AuthController::class, 'index']);

$router->post('/login', [AuthController::class, 'login']);

$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/dashboard', [DashboardController::class, 'index']);
// Appointments
$router->get('/appointments', [AppointmentController::class, 'index']);

$router->get('/appointments/show', [AppointmentController::class, 'show']);

$router->get('/appointments/edit', [AppointmentController::class, 'edit']);

$router->post('/appointments/update', [AppointmentController::class, 'update']);

$router->get('/appointments/delete', [AppointmentController::class, 'delete']);
// Products
$router->get('/products', [ProductController::class, 'index']);

$router->get('/products/show', [ProductController::class, 'show']);

$router->get('/products/create', [ProductController::class, 'create']);

$router->post('/products/store', [ProductController::class, 'store']);

$router->get('/products/edit', [ProductController::class, 'edit']);

$router->post('/products/update', [ProductController::class, 'update']);

$router->get('/products/delete', [ProductController::class, 'delete']);
// Services
$router->get('/services', [ServiceController::class, 'index']);

$router->get('/services/create', [ServiceController::class, 'create']);

$router->post('/services/store', [ServiceController::class, 'store']);

$router->get('/services/show', [ServiceController::class, 'show']);

$router->get('/services/edit', [ServiceController::class, 'edit']);

$router->post('/services/update', [ServiceController::class, 'update']);

$router->get('/services/delete', [ServiceController::class, 'delete']);
// Messages
$router->get('/messages', [MessageController::class, 'index']);

$router->get('/messages/show', [MessageController::class, 'show']);

$router->get('/messages/delete', [MessageController::class, 'delete']);
?>