<?php

namespace App\Services;

use App\Repositories\ConducteurtRepository;
use App\Exceptions\InputException;

class ConducteurService
{
    private ConducteurtRepository $repository;

    public function __construct()
    {
        $this->repository = new ConducteurtRepository();
    }

    public function statistics()
    {
        return [
            $this->repository->getDemandeDetails(),
        ];
    }

    public function accepterDemande($id)
    {
        try {
            return $this->repository->accepterDemande($id);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de l'acceptation de la demande : " . $e->getMessage());
        }
    }

    public function refuserDemande($id)
    {
        try {
            return $this->repository->refuseDemande($id);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors du refus de la demande : " . $e->getMessage());
        }
    }
}