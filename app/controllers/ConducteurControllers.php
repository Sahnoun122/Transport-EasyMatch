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
  

    public function handleDemandeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $demandeId = $_POST['demande_id'] ?? null;
            $action = $_POST['action'] ?? null;

            if ($demandeId && $action) {
                try {
                    if ($action === 'Accepte') {
                        $result = $this->repository->accepterService($demandeId);
                        if ($result) {

                            header('Location: /conducteur/dashbordconsulter');
                            exit();
                        }
                    } elseif ($action === 'Refuse') {
                        $result = $this->repository->refuseService($demandeId);
                        if ($result) {
                            
                            header('Location: /conducteur/dashbordconsulter');
                            exit();
                        }
                    }
                } catch (\Exception $e) {
                    header('Location:  /conducteur/dashbordconsulter');
                    exit();
                }
            }
        }
        header('Location: /conducteur/dashbordconsulter');
        exit();
    }
}

?>
