<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\ExpiditeurController;

use App\Middlewares\AuthMiddleware;

$router = new Core\Router;

$router
->get('/', function(){
    return 'Hello world';
})
->get('/expiditeur/dashboard', [ExpiditeurController::class, 'dashboard']);


try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}