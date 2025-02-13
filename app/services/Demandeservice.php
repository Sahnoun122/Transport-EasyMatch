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


    public function createDemande(Demande $data) {
        $data['statut'] = 'Soumis'; 

        return $this->repository->insertDemande($data);
    }
}
