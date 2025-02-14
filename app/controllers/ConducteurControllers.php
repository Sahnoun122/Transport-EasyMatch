<?php
namespace App\Controllers;
use App\Services\ConducteurService;
use Core\View;
use App\Controllers\EmailController;

class ConducteurControllers {
    protected $repository;

    public function __construct() {
        $this->repository = new ConducteurService();
    }

    public function Consulter() {
        $Consulter = $this->repository->Consulter();
        return View::make('conducteur/consulterdemande', ['Consulter' => $Consulter]);
    }

    public function handleDemandeAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demandeId = $_POST['demande_id'] ?? null;
            $action = $_POST['action'] ?? null;

            if ($demandeId && $action) {
                try {
                    if ($action === 'Accepte') {
                        $result = $this->repository->accepterService($demandeId);
                            $sujet = "Confirmation de demande";
                            $destinateur_nom = 'Khadija Sahnoun';
                            $email_nom = 'khadijasahnoun46@gmail.com';
                            $destinataire = 'khadijasahnoun70@gmail.com'; 
                            $message = '<h3>Bonjour,</h3><p>Votre demande a été acceptée.</p>';

                            $emailController = new EmailController($sujet, $destinateur_nom, $email_nom, $destinataire, $message);
                            $resultat = $emailController->envoyer();

                            echo $resultat; 
                        if ($result) {

                            

                            header('Location: /conducteur/dashbordconsulter');
                            exit();
                        }
                    } elseif ($action === 'Refuse') {
                        $result = $this->repository->refuseService($demandeId);

                        $sujet = "Refuse de demande";
                        $destinateur_nom = 'Khadija Sahnoun';
                        $email_nom = 'khadijasahnoun46@gmail.com';
                        $destinataire = 'khadijasahnoun70@gmail.com'; 
                        $message = '<h3>Bonjour,</h3><p>Votre demande a été Refuse.</p>';

                        $emailController = new EmailController($sujet, $destinateur_nom, $email_nom, $destinataire, $message);
                        $resultat = $emailController->envoyer();

                        echo $resultat;
                        if ($result) {
                        
                             
                            header('Location: /conducteur/dashbordconsulter');
                            exit();
                        }
                    }
                } catch (\Exception $e) {
                    echo "Erreur : " . $e->getMessage();
                    header('Location: /conducteur/dashbordconsulter');
                    exit();
                }
            }
        }
        header('Location: /conducteur/dashbordconsulter');
        exit();
    }
}