<?php

namespace App\Controllers;

use App\Services\AnnonceService;
use Core\View;

class AnnonceController{
    private AnnonceService $annonceService;

    public function __construct(){
        $this->annonceService = new AnnonceService();
    }

    public function annonceView(){
        return View::make('annonce/createannonce');
    }

    public function createAnnonce(){
        $result = $this->annonceService->createAnnonce($_POST);
        if($result['success'] === true){
            return View::make('auth/register', ['success' => true]);
        }

        return View::make('auth/register', ['errors' => $result['errors']]);
    }
}