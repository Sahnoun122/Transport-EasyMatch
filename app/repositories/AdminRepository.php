<?php

namespace App\Repositories;

use App\Models;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;

class AdminRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function  suspendreUser($id)
    {
        try {
            $sql = "UPDATE users SET  is_suspend = 1 WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return false;
        }
    }
    public function  validerUser($id)
    {
        try {
            $sql = "UPDATE users SET  is_suspend = 0 WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return false;
        }
    }
    public function  getAllUser()
    {
        try {
            $sql = "select  *  from  users";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }   catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return [];
        }
    }
}
