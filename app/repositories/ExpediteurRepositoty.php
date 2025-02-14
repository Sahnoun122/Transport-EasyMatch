<?php

namespace App\Repositories;
use App\Models\Expediteur;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;
class ExpediteurRepository {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function  rechercheAnnonce($fromeCity , $toCity){
        try {
            $sql = "
             select  a.id  
            from  annonce  a  join  trajet  f   
            on a.id = f.annonce_id
            join  trajet t on  f.id = t.id  
            where f.order < t.order and
            f.city =:fromeCity and t.city =:toCity ;
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":fromeCity", $fromecity, PDO::PARAM_INT);
            $stmt->bindParam(":toCity", $toCity, PDO::PARAM_INT);

            $stmt->execute();
            return  $stmt;
        } catch (PDOException $e) {
            return "Erreur lors de la confirmation demande : " . $e->getMessage();
        }
    }
}