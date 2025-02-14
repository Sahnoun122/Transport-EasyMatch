<?php

namespace App\Services;

use App\Repositories\ConducteurRepository;
use App\Exceptions\InputException;

class ConducteurService
{
    private ConducteurRepository $repository;

    public function __construct()
    {
        $this->repository = new ConducteurRepository();
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
            return $this->repository->refuserDemande($id);
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors du refus de la demande : " . $e->getMessage());
        }
    }
}