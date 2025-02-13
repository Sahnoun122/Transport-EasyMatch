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
}