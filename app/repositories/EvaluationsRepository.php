<?php

namespace App\Repositories;

use App\Models\Evaluation;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;

class EvaluationRepository {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function afficherEvaluation() {
        try {
            $query = "SELECT * FROM Evaluation";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? [];
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return [];
        }
    }
    
}