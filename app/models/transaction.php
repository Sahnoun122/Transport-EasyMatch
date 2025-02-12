<?php

class Transaction {
    protected $id;
    protected $current_destination;
    protected $status;
    protected $createdAt;

    public function __construct($id = null, $current_destination = null, $status = null, $createdAt = null) {
        $this->id = $id;
        $this->current_destination = $current_destination;
        $this->status = $status;
        $this->createdAt = $createdAt ?? new DateTime();
    }

    // Accesseur (Getters)
    public function getId() {
        return $this->id;
    }

    public function getCurrentDestination() {
        return $this->current_destination;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    // Modificateur (Setters)
    public function setCurrentDestination($current_destination) {
        if ($current_destination !== null) {
            $this->current_destination = $current_destination;
        } else {
            throw new Exception("La destination actuelle ne peut pas être null.");
        }
    }

    public function setStatus($status) {
        $allowedStatuses = ['pending', 'completed', 'cancelled'];
        if ($status !== null && in_array($status, $allowedStatuses, true)) {
            $this->status = $status;
        } else {
            throw new Exception("Statut invalide. Les statuts autorisés sont : 'pending', 'completed', 'cancelled'.");
        }
    }

    public function setCreatedAt($createdAt) {
        if ($createdAt instanceof DateTime || $createdAt === null) {
            $this->createdAt = $createdAt ?? new DateTime();
        } else {
            throw new Exception("La date de création doit être une instance de DateTime ou null.");
        }
    }
}