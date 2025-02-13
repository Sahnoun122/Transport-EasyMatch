<?php


namespace App\Services;
use App\Repositories\ConducteurtRepository;
use App\Exceptions\InputException;


class ConducteurService{
    private  ConducteurtRepository $repository;


    public function __construct(){
        $this->repository = new ConducteurtRepository();
    }


    public function Consulter(){

        return $this->repository->getDemandeDetails();
        
    }
    public function accepterdemande($id){
        try{
            return $this->repository->accepterdemande($id);
        }catch(\Exception $e){
            return false;
        }
    }
   
    public function refusedemande($id){
        try{
            return $this->repository->refusedemande($id);
        }catch(\Exception $e){
            return false;
        }
    }


}
