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

    public function afficherAnnonce($id) {
        try {
            $query = "SELECT description, from_city, to_city, date_depart, created_at FROM Annonce WHERE statut = 'Active' AND conducteur_id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll() ?? [];
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return [];
        }
    }

    public function insertDemande(Demande $data){
        try {
            $query = 'INSERT INTO Demande (expediteur_id, annonce_id, type_id, longueur, largeur, hauteur, poids, depart, destination, statut) 
                      VALUES (:expediteur_id, :annonce_id, :type_id, :longueur, :largeur, :hauteur, :poids, :depart, :destination, :statut)';
            $stmt = $this->db->prepare($query);

            $stmt->bindValue(':expediteur_id', $data-> getIdExpedeteur() , PDO::PARAM_INT);
            $stmt->bindValue(':annonce_id', $data->getIdAnnonce(), PDO::PARAM_INT);
            $stmt->bindValue(':type_id', $data-> getIdType(), PDO::PARAM_INT);
            $stmt->bindValue(':longueur', $data->getLongueur(), PDO::PARAM_STR);
            $stmt->bindValue(':largeur', $data->getLargeur(), PDO::PARAM_STR);
            $stmt->bindValue(':hauteur', $data->getHauteur() , PDO::PARAM_STR);
            $stmt->bindValue(':poids', $data-> getPoids(), PDO::PARAM_STR);
            $stmt->bindValue(':depart', $data->getDepart(), PDO::PARAM_STR);
            $stmt->bindValue(':destination', $data->getDestination(), PDO::PARAM_STR);
            $stmt->bindValue(':statut', $data->getStatus(), PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

}


    
    

