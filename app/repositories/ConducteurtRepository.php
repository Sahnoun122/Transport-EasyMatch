<?php
namespace App\Repositories;

use App\Models\Conducteur;
use Core\Database;
use PDO;
use PDOException;
use Core\Logger;


class ConducteurtRepository
{
    private PDO $db;


    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getDemandeDetails()
    {
        try {
            $query = "
                SELECT
                    d.id,
                    d.longueur,
                    d.largeur,
                    d.hauteur,
                    d.poids,
                    d.depart,
                    d.destination,
                    d.statut,
                    u.fname AS expediteur_name, 
                    t.name AS type
                FROM
                    Demande d
                JOIN
                    Users u ON d.expediteur_id = u.id
                JOIN
                    Type t ON d.type_id = t.id
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            Logger::error_log($e->getMessage());
            return [];
        }
    }
   
    public function accepterdemande($id)
    {
        try {
            $sql = "UPDATE Demande 
                        SET Statut = 'Accepte' 
                        WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);


            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la confirmation demande : " . $e->getMessage();
        }
    }


    public function refusedemande($id)
    {
        try {
            $sql = "UPDATE Demande SET  Statut = 'Refuse' WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            return "Erreur lors de la Refuse demande : " . $e->getMessage();
        }
    }



    
}
