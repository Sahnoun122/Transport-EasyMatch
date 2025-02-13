<?php

namespace App\Controllers;

use App\Services\DemandeService;
use App\Services\AuthService;
use Core\View;

class DemandeController{
    private DemandeService $DemandeService;

    public function __construct(){
        $this->DemandeService = new DemandeService();
    }

    public function Dashboard(){
        return View::make('expediteur/dashbord', ['statistics' => $this->DemandeService->statistics()]);
    }

    
    public function createAnnonce($id_expediteur){
        $this->DemandeService->createAnnonce($_POST, $id_expediteur);
        header('Location: /expediteur/dashbord');
    }
}