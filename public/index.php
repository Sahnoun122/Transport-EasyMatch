<?php
session_start();
require_once './../vendor/autoload.php';
require __DIR__.'/../app/config/environment.php';

use App\Exceptions\RouteNotFoundException;
use App\Controllers\DemandeController;
use App\Controllers\AdminController;
use App\Controllers\EvaluationController;
use App\Controllers\ConducteurControllers;
use App\Middlewares\AuthMiddleware;

$router = new Core\Router;



$router
->get('/', function(){
    return 'Hello world';
})
->get('/expiditeur/dashboard', [DemandeController::class, 'Dashboard'])
->get('/admin/utilisateurs', [AdminController::class, 'afficher'])
->post('/expiditeur/dashboard{id_expiditeur}', [DemandeController::class, 'createAnnonce'])
->post('/admin/suspend/{id}', [AdminController::class, 'suspendre']);
->post('/expiditeur/dashboard{id_expiditeur}', [DemandeController::class, 'createDemande'])
->get('/expediteur/dashboard', [DemandeController::class, 'Dashboard'])
->get('/conducteur/dashbordconsulter', [ConducteurControllers::class, 'Consulter'])
->post('/expediteur/dashboard{id_expiditeur}', [DemandeController::class, 'createAnnonce'])
->get('/admin/evaluations',[EvaluationController::class, 'display_evaluation']);


try{
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
}catch(RouteNotFoundException $e){
    echo $e->getMessage();
}
