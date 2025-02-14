<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\DemandeController;
use App\Controllers\EvaluationController;

$router = new Core\Router;



$router
->get('/', function(){
    return 'Hello world';
})
->get('/expediteur/dashboard', [DemandeController::class, 'Dashboard'])
->post('/expediteur/dashboard{id_expiditeur}', [DemandeController::class, 'createAnnonce'])
->get('/admin/evaluations',[EvaluationController::class, 'display_evaluation']);


try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}