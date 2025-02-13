<?php

namespace App\Services;
use App\Repositories\DashboardCondecteur;
use App\Exceptions\InputException;

class ConducteurService{
    private  DashboardCondecteur $repository;

    public function __construct(){
        $this->repository = new DashboardCondecteur();
    }

  
    public function updateReservationStatus($id, $status){
        try{
            return $this->repository->updateReservationStatus($id, $status);
        }catch(\Exception $e){
            return false;
        }
    }

}