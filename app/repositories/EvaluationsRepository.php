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
    
    public function Stars($rate){
        try{
            $stmt = $this->db->prepare("SELECT rate FROM Evaluation WHERE rate = :rate");
            $stmt->bindParam(':rate', $rate);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC) ?? [];

        }catch(PDOException $e){
            Logger::error_log($e->getMessage());
            return [];
        }
    }
}