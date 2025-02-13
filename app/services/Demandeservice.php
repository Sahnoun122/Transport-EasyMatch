<?php

namespace App\Services;
use App\Repositories\DemandeRepository;
use App\Exceptions\InputException;

class DemandeService{
    private  DemandeRepository $repository;

    public function __construct(){
        $this->repository = new DemandeRepository();
    }

    public function statistics(){
        return [
            $this->repository->afficherAnnonce(),
        ];
    }


}