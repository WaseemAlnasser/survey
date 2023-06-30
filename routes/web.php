<?php
require_once 'app/Core/Router.php';
require_once 'app/Core/Request.php';
require_once 'app/Controllers/AppController.php';
require_once 'app/Controllers/SurveyController.php';
require_once 'app/Controllers/UserController.php';


$router = Router::make();

// define routes
$router->get('', [AppController::class, 'home']);

$router->get('login', [AppController::class, 'login']);

$router->post('login', [AppController::class, 'login_post']);

$router->get('logout', [AppController::class, 'logout']);

$router->get('register', [AppController::class, 'register']);

$router->post('register', [AppController::class, 'register_post']);

$router->get('survey', [SurveyController::class, 'survey']);

$router->post('survey/submit', [SurveyController::class, 'submit']);

$router->get('admin', [AppController::class, 'admin']);

$router->get('admin/survey/all', [SurveyController::class, 'all']);

$router->post('admin/survey/store', [SurveyController::class, 'store']);

$router->post('admin/survey/edit', [SurveyController::class, 'edit']);

$router->get('admin/survey/build', [SurveyController::class, 'build']);

$router->get('admin/survey/submissions', [SurveyController::class, 'submissions']);

$router->get('admin/survey/answers', [SurveyController::class, 'answers']);

$router->get('admin/survey/delete', [SurveyController::class, 'delete']);

$router->get('admin/users/all', [UserController::class, 'all']);

$router->get('admin/user/edit', [UserController::class, 'edit']);


$router->post('admin/user/update', [UserController::class, 'update']);

$router->get('admin/users/create', [UserController::class, 'create']);

$router->post('admin/users/store', [UserController::class, 'store']);

$router->resolve(Request::uri(), Request::method());
