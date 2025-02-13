<?php

namespace App\Repositories;
use App\Models\Demande;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;
class DemandeRepository {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function afficherAnnonce() {
        try {
            $query = "SELECT description, fromcity, tocity, datedepart, createdAt FROM annonces WHERE Statut = 'Active' AND conducteur_id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $_SESSION['user_id'], PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchColumn() ?? 0;
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return 0;
        }
    }
   
    // public function DemandeAnnonce(Demande $demande){
    //     try{
    //         $query = 'INSERT INTO reservation(expediteur_id, annonce_id,type_id , longueur,largeur, hauteur, poids, depart,destination  , statut) 
    //         VALUES(:expediteur_id, :annonce_id, :type_id ,:longueur , :largeur ,:hauteur ,:poids ,:depart ,:destination , :statut)';
    //         $stmt = $this->db->prepare($query);
    //         $stmt->bindValue(':expediteur_id', $demande->getIdexpediteur(), PDO::PARAM_INT);
    //         $stmt->bindValue(':annonce_id', $demande->getIdannonce(), PDO::PARAM_INT);
    //         $stmt->bindValue(':type_id', $demande->getIdtype(), PDO::PARAM_STR);
    //         $stmt->bindValue(':longueur', $demande->getStatus(), PDO::PARAM_STR);
    //         $stmt->bindValue(':largeur', $demande->getStatus(), PDO::PARAM_STR);
    //         $stmt->bindValue(':hauteur', $demande->getStatus(), PDO::PARAM_STR);
    //         $stmt->bindValue(':poids', $demande->getStatus(), PDO::PARAM_STR);
    //         $stmt->bindValue(':depart', $demande->getStatus(), PDO::PARAM_STR);
    //         $stmt->bindValue(':statut', $demande->getStatus(), PDO::PARAM_STR);

    //         if($stmt->execute()){
    //             return true;
    //         }
    //      return false;
    //     }catch(PDOException $e){
    //         Logger::error_log($e->getMessage());
    //         return false;
    //     }
    // }
    }
    
    

