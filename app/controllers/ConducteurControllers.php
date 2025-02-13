<?php

namespace App\Controllers;

use App\Services\ConducteurService;
use App\Services\AuthService;
use Core\View;

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
}