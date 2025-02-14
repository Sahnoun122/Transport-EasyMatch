<?php

namespace App\Controllers;

use App\Services\EvaluationService;
use Core\View;

class EvaluationController{
    protected $EvaluationService;

    public function __construct(){
        // Initialisation du repository
        $this->EvaluationService = new EvaluationService();
    }

    public function evaluation_list(){
        // Appel de la méthode statistics() via le repository
        $evaluation = $this->EvaluationService->display_all_evaluation();
        return View::make('evaluation', ['evaluation' => $evaluation]);
    }
}