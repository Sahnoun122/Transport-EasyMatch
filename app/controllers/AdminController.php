<?php

namespace App\Controllers;

use App\Services\AdminService;
use App\Services\AuthService;
use Core\View;

class AdminController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new AdminService();
    }

    public function suspendre($id)
    {
        $this->repository->suspendre($id);
        // return View::make('admin/utilisateurs', []);
    }
    public function afficher(){
        $users = $this->repository->afficher();
        return View::make('admin/utilisateurs', ['afficher' => $users]);
    }
}