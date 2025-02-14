<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\AuthController;
use App\Controllers\AnnonceController;

use App\Middlewares\GuestMiddleware;
use App\Middlewares\AuthMiddleware;

$router = new Core\Router;

$router
->group('/auth', function($group){
    $group->get('/register', [AuthController::class, 'registerGET']);
    $group->post('/register', [AuthController::class, 'registerPOST']);
    $group->get('/login', [AuthController::class, 'loginGET']);
    $group->post('/login', [AuthController::class, 'loginPOST']);
}, [GuestMiddleware::class])
->get('/annonce/create', [AnnonceController::class, 'annonceView'], [AuthMiddleware::class, 'conducteur'])
->post('/annonce/create', [AnnonceController::class, 'createAnnonce'], [AuthMiddleware::class, 'conducteur']);

try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}