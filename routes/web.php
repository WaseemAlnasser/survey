<?php
require_once 'app/Core/Router.php';
require_once 'app/Core/Request.php';
require_once 'app/Controllers/AppController.php';


$router = Router::make();

// define routes
$router->get('', [AppController::class, 'home']);

$router->get('login', [AppController::class, 'login']);

$router->post('login', [AppController::class, 'login_post']);

$router->get('logout', [AppController::class, 'logout']);

$router->get('register', [AppController::class, 'register']);

$router->post('register', [AppController::class, 'register_post']);

$router->resolve(Request::uri(), Request::method());
