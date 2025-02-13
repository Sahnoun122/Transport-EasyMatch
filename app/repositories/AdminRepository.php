<?php

namespace App\Repositories;
use App\Models\Demande;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;
class AdminRepository {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function  suspendreUser($id){
        try {
            $sql = "UPDATE users SET  is_suspend = 0 WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la confirmation demande : ". $e->getMessage();
        }
    }
    // public function accepter
}