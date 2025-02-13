<?php

namespace App\Controllers;

use App\Services\DemandeService;
use App\Services\AuthService;
use Core\View;

class DemandeController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new DemandeService();
    }

    public function Dashboard()
    {
        $statistics = $this->repository->statistics();
        return View::make('expediteur/dashborddemande', ['statistics' => $statistics]);
    }



    public function createDemande(){
        $this->repository->createDemande($_POST);
        header('Location: /expiditeur/dashboard');
    }

}
