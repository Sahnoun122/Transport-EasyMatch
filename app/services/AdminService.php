<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService
{
    private  AdminRepository $repository;

    public function __construct()
    {
        $this->repository = new AdminRepository();
    }
    public function suspendre($id)
    {
        return $this->repository->suspendreUser($id);
    }

    public function valider($id)
    {
        return $this->repository->validerUser($id);
    }
    public function  afficher()
    {

        return $this->repository->getAllUser();
    }
}
