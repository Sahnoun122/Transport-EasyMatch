<?php

namespace App\Controllers;

use App\Services\ConducteurService;
use Core\View;
use mail\PHPMailer;
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
        return View::make('conducteur/consulterdemande', ['Consulter' => $Consulter]);
    }


    // public function actionDemande()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $demande_id = $_POST['demande_id'];
    //         $action = $_POST['action'];

    //         $demande = $this->repository->getDemandeById($demande_id);

    //         if ($demande) {
    //             // $email = $demande['expediteur_email']; 
    //             // $prenom = $demande['expediteur_name']; 
    //             if ($action === 'accept') {
    //                 $this->repository->accepterdemande($demande_id);

             

    //             } elseif ($action === 'reject') {
    //                 $this->repository->refusedemande($demande_id);

          
    //             }
    //         }
    //         header('Location:/conducteur/dashbordconsulter');
    //         exit;
    //     }
    // }

}
?>
