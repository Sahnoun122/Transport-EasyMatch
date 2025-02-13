<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Models\User;
use App\Exceptions\InputException;

class AuthService{
    private AuthRepository $repository;

    public function __construct(){
        $this->repository = new AuthRepository();
    }
}