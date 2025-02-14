<?php

namespace App\Controllers;

use App\Services\ConducteurService;
use Core\View;
use App\Controllers\EmailController;

class ConducteurControllers
{
    protected $service;

    public function __construct()
    {
        $this->service = new ConducteurService();
    }

    public function consulter()
    {
        $consulter = $this->service->statistics();
        return View::make('conducteur/consulterdemande', ['Consulter' => $consulter]);
    }

    public function handleDemandeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demandeId = $_POST['demande_id'] ?? null;
            $action = $_POST['action'] ?? null;

            if (!$demandeId || !$action) {
                $this->redirectWithError("Données manquantes.");
            }

            try {
                if ($action === 'Accepte') {
                    $result = $this->service->accepterDemande($demandeId);
                    $this->sendEmail(
                        "Confirmation de demande",
                        "Votre demande a été acceptée."
                    );
                } elseif ($action === 'Refuse') {
                    $result = $this->service->refuserDemande($demandeId);
                    $this->sendEmail(
                        "Refus de demande",
                        "Votre demande a été refusée."
                    );
                } else {
                    $this->redirectWithError("Action non reconnue.");
                }

                if ($result) {
                    header('Location: /conducteur/dashbordconsulter');
                    exit();
                }
            } catch (\Exception $e) {
                
                $this->redirectWithError("Erreur : " . $e->getMessage());
            }
        }

        $this->redirectWithError("Requête invalide.");
    }

    private function sendEmail($sujet, $message)
    {
        $destinateur_nom = 'Khadija Sahnoun';
        $email_nom = 'khadijasahnoun46@gmail.com';
        $destinataire = 'khadijasahnoun70@gmail.com';

        $emailController = new EmailController($sujet, $destinateur_nom, $email_nom, $destinataire, $message);
        $resultat = $emailController->envoyer();

        if (!$resultat) {
            throw new \Exception("Erreur lors de l'envoi de l'e-mail.");
        }
    }

    private function redirectWithError($message)
    {
        echo $message;
        header('Location: /conducteur/dashbordconsulter');
        exit();
    }
}