<?php

namespace App\Services;
use App\Exceptions\InputException;
use App\Models\Evaluation;
use App\Repositories\EvaluationRepository;

class EvaluationService{
    private  EvaluationRepository $repository;

    public function __construct(){
        $this->repository = new EvaluationRepository();
    }
    
    public function display_all_evaluation(){
        return $this->repository->afficherEvaluation();
    }
}