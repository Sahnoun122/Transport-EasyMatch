<?php

namespace App\Controllers;

use App\Services\DemandeService;
use App\Services\AuthService;
use Core\View;

class DashboardController{
    private DemandeService $DemandeService;

    public function __construct(){
        $this->DemandeService = new DemandeService();
    }

    public function index(){
        return View::make('expediteur/dashbord', ['statistics' => $this->DemandeService->statistics()]);
    }
}