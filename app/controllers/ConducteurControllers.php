<?php

namespace App\Controllers;

use App\Services\ConducteurService;
use Core\View;
require_once 'phpmailer/mail.php'; 

class ConducteurControllers
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ConducteurService();
    }

    public function Consulter()
    {
        $Consulter = $this->repository->Consulter();
        return View::make('conducteur/dashbordconsulter', ['Consulter' => $Consulter]);
    }

    public function actionDemande()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demande_id = $_POST['demande_id'];
            $action = $_POST['action'];

            $demande = $this->repository->getDemandeById($demande_id);

            if ($demande) {
                $email = $demande['expediteur_email']; 
                $prenom = $demande['expediteur_name']; 

                if ($action === 'accept') {
                    $this->repository->accepterdemande($demande_id);

                    $subject = 'Votre demande a été acceptée';
                    $body = "Bonjour $prenom,<br><br>Votre demande a été acceptée. Merci de votre confiance !";
                    sendEmail($email, $subject, $body);

                } elseif ($action === 'reject') {
                    $this->repository->refusedemande($demande_id);

                    $subject = 'Votre demande a été refusée';
                    $body = "Bonjour $prenom,<br><br>Nous regrettons de vous informer que votre demande a été refusée.";
                    sendEmail($email, $subject, $body);
                }
            }
            header('Location: /conducteur/dashbordconsulter');
            exit;
        }
    }
}
?>
