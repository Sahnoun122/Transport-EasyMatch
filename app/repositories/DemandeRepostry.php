<?php

namespace App\Repositories;

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
}
