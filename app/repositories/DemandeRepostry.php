<?php


namespace App\Repositories;

class DemandeRepostry{
          
    public function afficherAnnonce(){
    
            $stmt= " SELECT description,fromcity ,tocity,datedepart,createdAt WHERE  Statut = 'Active' ";

        
    }
      

}
