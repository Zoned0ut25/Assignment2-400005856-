<?php

use App\Controllers\HomeController;
use App\Controllers\RegistrationController;
use App\Controllers\DashboardController;
use App\Controllers\ResearchController;
use App\Controllers\StudyController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->post('/', HomeController::class, 'login');
$router->get('/registration', RegistrationController::class, 'index');
$router->post("/registration", RegistrationController::class, 'register');
$router->get('/dashboard', DashboardController::class, 'index');
$router->get('/dashboard/create-study', StudyController::class, 'index');
$router->get('/dashboard/research', ResearchController::class, 'index');
$router->get('/dashboard/research/create', ResearchController::class, 'display');
$router->post('/dashboard/research/create', ResearchController::class, 'create');
$router->get('/logout', DashboardController::class, 'logout');

$router->dispatch();