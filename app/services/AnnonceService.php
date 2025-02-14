<?php

namespace App\Services;

use App\Repositories\AnnonceRepository;
use App\Models\Annonce;
use App\Exceptions\InputException;

class AnnonceService{
    private AnnonceRepository $repository;

    public function __construct(){
        $this->repository = new AnnonceRepository();
    }

    public function createAnnonce($request){
        $errors = [];
        $nullvalue = false;
        if(!isset($request['description']) || empty($request['description'])){
            $errors[] = 'Description is required !';
            $nullvalue = true;
        }

        if(!isset($request['from_city']) || empty($request['from_city'])){
            $errors[] = 'Start city is required !';
            $nullvalue = true;
        }

        if(!isset($request['to_city']) || empty($request['to_city'])){
            $errors[] = 'Destination city is required !';
            $nullvalue = true;
        }
        
        if(!isset($request['date_depart']) || empty($request['date_depart'])){
            $errors[] = 'Start Date is required !';
            $nullvalue = true;
        }

        if(!isset($request['trajet']) || count($request['trajet']) == 0){
            $errors[] = 'Trajet is required';
            $nullvalue = true;
        }

        if($nullvalue)
            return ['success' => false, 'errors' => $errors];

        try{
            $annonce = new Annonce(null, $request['description'], null, $request['from_city'], $request['to_city'], $request['date_depart'], null, $_SESSION['user_id']);            
            if($this->repository->createAnnonce($annonce, $request['trajet'])){
                return ['success' => true];
            }
            return ['success' => false, 'errors' => ['Something went wrong please try again later !']];
        }catch(InputException $e){
            return ['success' => false, 'errors' => [$e->getMessage()]];
        }
        
    }
}