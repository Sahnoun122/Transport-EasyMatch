<?php

namespace App\Services;

use App\Repositories\EvaluationRepository;

class EvaluationService{
    private  EvaluationRepository $repository;

    public function __construct(){
        $this->repository = new EvaluationRepository();
    }
    
    public function display_all_evaluation(){
        return $this->repository->afficherEvaluation();
    }

    public function count_star(){
        $rate = 5;
        return $this->repository->Stars($rate);
    }
}