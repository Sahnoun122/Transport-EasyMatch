<?php


namespace App\Services;
use App\Repositories\ConducteurtRepository;
use App\Exceptions\InputException;


class ConducteurService{
    private  ConducteurtRepository $repository;


    public function __construct(){
        $this->repository = new ConducteurtRepository();
    }
    

    
    public function  Consulter() {
        try{
            return $this->repository->getDemandeDetails();
        }catch(\Exception $e){
            return false;
        }
    }


    public function accepterService($id){
        try{
            return $this->repository->accepterdemande($id);
        }catch(\Exception $e){
            return false;
        }
    }
   
    public function refuseService($id){
        try{
            return $this->repository->refusedemande($id);
        }catch(\Exception $e){
            return false;
        }
    }
}