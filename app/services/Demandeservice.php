<?php

namespace App\Services;
use App\Repositories\DemandeRepository;
use App\Exceptions\InputException;
use App\Models\Demande;

class DemandeService{
    private  DemandeRepository $repository;

    public function __construct(){
        $this->repository = new DemandeRepository();
    }
    
    public function statistics(){
        $conducteur_id = 1; 
        return $this->repository->afficherAnnonce($conducteur_id);
    }


    public function createDemande($request) {

        try{
            $demande = new Demande(1,1,1, $request['longueur'],$request['largeur'],$request['hauteur'],$request['poids'],$request['depart'],$request['destination'],  $_SESSION['user_id']);
            if($this->repository->insertDemande($demande)){
                return ['success' => true];
            }
            return ['success' => false, 'errors' => ['Something went wrong please try again later !']];
        }catch(InputException $e){
            return ['success' => false, 'errors' => [$e->getMessage()]];
        }
    }
}
