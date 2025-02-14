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
        try{
            if(is_string($value))
                $emailCheckQuery = 'SELECT * FROM Users WHERE email = :value';
            else
                $emailCheckQuery = 'SELECT * FROM Users WHERE id = :value';

            $emailCheckStmt = $this->db->prepare($emailCheckQuery);
            $emailCheckStmt->bindValue(':value', $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            $emailCheckStmt->execute();
            $user = $emailCheckStmt->fetch();
            return $user;
        }catch(PDOException $e){
            Logger::error_log($e->getMessage());
            return null;
        }
    }

    public function register(User $user){
        try{
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);    
            $query = 'INSERT INTO Users(fname, lname, email, password, role) VALUES(:fname, :lname, :email, :password, :role)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':fname', htmlspecialchars($user->getFname()), PDO::PARAM_STR);
            $stmt->bindValue(':lname', htmlspecialchars($user->getLname()), PDO::PARAM_STR);
            $stmt->bindValue(':email', htmlspecialchars($user->getEmail()), PDO::PARAM_STR);
            $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindValue(':role', htmlspecialchars($user->getRole()), PDO::PARAM_STR);
            if($stmt->execute()){
                return true;
            }
    
            return false;
        }catch(PDOException $e){
            Logger::error_log($e->getMessage());
            return false;
        }
    }

    public function login(User $user){
        try{
            $query = 'SELECT id, role, password FROM Users WHERE email = :email';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            Logger::error_log($e->getMessage());
            return null;
        }
    }
}