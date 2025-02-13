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

    // public function createAnnonce( $id_expediteur){
    //     try{
    //         $demande = new Demande( $_SESSION['user_id'], $id_expediteur);
    //         if($this->repository->createAnnonce($demande)){
    //             return ['success' => true];
    //         }

    //         return ['success' => false, 'errors' => ['Something went wrong please try again later !']];
    //     }catch(InputException $e){
    //         return ['success' => false, 'errors' => [$e->getMessage()]];
    //     }
    // }
}