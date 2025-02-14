<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Trajet;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;

class AnnonceRepository{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function createAnnonce(Annonce $annonce, array $trajets) {
        try {   
            $this->db->beginTransaction();
    
            $queryAnnonce = 'INSERT INTO Annonce(description, from_city, statut, to_city, date_depart, conducteur_id) 
                             VALUES(:description, :fromcity, :statut, :tocity, :datedepart, :conducteur_id)';
            
            $stmtAnnonce = $this->db->prepare($queryAnnonce);
            
            $stmtAnnonce->bindValue(':description', htmlspecialchars($annonce->getDescription()), PDO::PARAM_STR);
            $stmtAnnonce->bindValue(':fromcity', htmlspecialchars($annonce->getFromCity()), PDO::PARAM_STR);
            $stmtAnnonce->bindValue(':statut', 'Active', PDO::PARAM_STR);
            $stmtAnnonce->bindValue(':tocity', htmlspecialchars($annonce->getToCity()), PDO::PARAM_STR);
            $stmtAnnonce->bindValue(':datedepart', $annonce->getDateDepart(), PDO::PARAM_STR);
            $stmtAnnonce->bindValue(':conducteur_id', $annonce->getConducteurId(), PDO::PARAM_INT);
            
            if (!$stmtAnnonce->execute()) {
                $this->db->rollBack();
                return false;
            }
    
            $annonceId = $this->db->lastInsertId();
            
            $queryTrajet = 'INSERT INTO Trajet(city, "order", annonce_id) VALUES(:city, :order, :annonce_id)';
            $stmtTrajet = $this->db->prepare($queryTrajet);
    
            foreach ($trajets as $index => $trajet) {

                $stmtTrajet->bindValue(':city', htmlspecialchars($trajet['city']), PDO::PARAM_STR);
                $stmtTrajet->bindValue(':order', $trajet['order'], PDO::PARAM_INT);
                $stmtTrajet->bindValue(':annonce_id', $annonceId, PDO::PARAM_INT);
    
                if (!$stmtTrajet->execute()) {
                    $this->db->rollBack();
                    return false;
                }
            }
    
            $this->db->commit();
            return true;
            
        } catch (PDOException $e) {
            $this->db->rollBack();
            Logger::error_log($e->getMessage());
            return false;
        }
    }
      
}