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
        // Initialisation du repository
        $this->repository = new DemandeService();
    }

    public function Dashboard()
    {
        // Appel de la méthode statistics() via le repository
        $statistics = $this->repository->statistics();
        return View::make('expediteur/dashborddemande', ['statistics' => $statistics]);
    }

}

