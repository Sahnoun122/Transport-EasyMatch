<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\DemandeController;


use App\Middlewares\AuthMiddleware;

$router = new Core\Router;

$router
->get('/', function(){
    return 'Hello world';
})
->get('/expiditeur/dashboard', [DemandeController::class, 'Dashboard']);


try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}