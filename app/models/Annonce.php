<?php

namespace App\Models;

use App\Exceptions\InputException;
use DateTime;

class Annonce {
    private ?int $id;
    private ?string $description;
    private ?string $statut;
    private ?string $from_city;
    private ?string $to_city;
    private $date_depart;
    private ?DateTime $created_at;
    private ?int $conducteur_id;
    private array $errors = [];

    public function __construct(
        ?int $id = null,
        ?string $description = null,
        ?string $statut = null,
        ?string $from_city = null,
        ?string $to_city = null,
        $date_depart = null,
        ?DateTime $created_at = null,
        ?int $conducteur_id = null
    ) {
        try {
            $this->setId($id);
            $this->setDescription($description);
            $this->setStatut($statut);
            $this->setFromCity($from_city);
            $this->setToCity($to_city);
            $this->setDateDepart($date_depart);
            $this->created_at = $created_at ?? new DateTime();
            $this->setConducteurId($conducteur_id);
        } catch (InputException $e) {
            $this->errors[] = $e->getMessage();
        }
    }

    // Getters
    public function getId(): ?int { return $this->id; }
    public function getDescription(): ?string { return $this->description; }
    public function getStatut(): ?string { return $this->statut; }
    public function getFromCity(): ?string { return $this->from_city; }
    public function getToCity(): ?string { return $this->to_city; }
    public function getDateDepart(){ return $this->date_depart; }
    public function getCreatedAt(): DateTime { return $this->created_at; }
    public function getConducteurId(): ?int { return $this->conducteur_id; }

    // Setters
    public function setId(?int $id): void {
        if ($id !== null && $id <= 0) {
            throw new InputException("Invalid ID");
        }
        $this->id = $id;
    }

    public function setDescription(?string $description): void {
        $this->description = $description; 
    }

    public function setStatut(?string $statut): void {
        $validStatuses = ['pending', 'confirmed', 'canceled'];
        if ($statut !== null && !in_array($statut, $validStatuses)) {
            throw new InputException("Invalid status");
        }
        $this->statut = $statut;
    }

    public function setFromCity(?string $from_city): void {
        $this->from_city = $from_city;
    }

    public function setToCity(?string $to_city): void {
        $this->to_city = $to_city;
    }

    public function setDateDepart($date_depart): void {
        $this->date_depart = $date_depart;
    }

    public function setConducteurId(?int $conducteur_id): void {
        if ($conducteur_id !== null && $conducteur_id <= 0) {
            throw new InputException("Invalid conducteur ID");
        }
        $this->conducteur_id = $conducteur_id;
    }
}