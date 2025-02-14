<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\DemandeController;
use App\Controllers\EvaluationController;
use App\Middlewares\AuthMiddleware;

$router = new Core\Router;



$router
->get('/', function(){
    return 'Hello world';
})
->get('/expiditeur/dashboard', [DemandeController::class, 'Dashboard'])
->post('/expiditeur/dashboard{id_expiditeur}', [DemandeController::class, 'createDemande'])
->get('/expediteur/dashboard', [DemandeController::class, 'Dashboard'])
->post('/expediteur/dashboard{id_expiditeur}', [DemandeController::class, 'createAnnonce'])
->get('/admin/evaluation',[EvaluationController::class, 'display_evaluation']);


try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}
