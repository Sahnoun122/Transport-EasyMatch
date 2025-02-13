<?php

namespace App\Repositories;
use App\Models\Conducteur;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;
 
class DashboardCondecteur {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function accepterannonce($id){
        try {
            $sql = "UPDATE Annonce SET  Statut = 'Accepté' WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la confirmation demande : ". $e->getMessage();
        }
    }
    
}