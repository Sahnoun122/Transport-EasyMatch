<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Patient;
use App\Models\Medecin;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;

class AuthRepository{
    private PDO $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getUserByEmailOrId($value){
        if(is_string($value))
            $emailCheckQuery = 'SELECT * FROM "user" WHERE email = :value';
        else
            $emailCheckQuery = 'SELECT * FROM "user" WHERE id = :value';

        $emailCheckStmt = $this->db->prepare($emailCheckQuery);
        $emailCheckStmt->bindValue(':value', $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        $emailCheckStmt->execute();
        $user = $emailCheckStmt->fetch();
        return $user;
    }
}