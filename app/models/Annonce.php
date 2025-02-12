<?php 

namespace App\Models;


 class Annonce {
    private int $id;
    private string $description;
    private string $statut;
    private string $from_city;
    private string $to_city;
    private DateTime $date_depart;
    private DateTime $created_at;
    private ?int $conducteur_id;

    public function __construct(
        int $id,
        string $description,
        string $statut,
        string $from_city,
        string $to_city,
        DateTime $date_depart,
        DateTime $created_at,
        ?int $conducteur_id = null
    ) {
      // should work with setters 
        $this->id = $id;
        $this->description = $description;
        $this->statut = $statut;
        $this->from_city = $from_city;
        $this->to_city = $to_city;
        $this->date_depart = $date_depart;
        $this->created_at = $created_at;
        $this->conducteur_id = $conducteur_id;
    }

    // Getters
    public function getId(): int { return $this->id; }
    public function getDescription(): string { return $this->description; }
    public function getStatut(): string { return $this->statut; }
    public function getFromCity(): string { return $this->from_city; }
    public function getToCity(): string { return $this->to_city; }
    public function getDateDepart(): DateTime { return $this->date_depart; }
    public function getCreatedAt(): DateTime { return $this->created_at; }
    public function getConducteurId(): ?int { return $this->conducteur_id; }

    // Setters should have validation 
    public function setDescription(string $description): void { $this->description = $description; }
    public function setStatut(string $statut): void { $this->statut = $statut; }
    public function setFromCity(string $from_city): void { $this->from_city = $from_city; }
    public function setToCity(string $to_city): void { $this->to_city = $to_city; }
    public function setDateDepart(DateTime $date_depart): void { $this->date_depart = $date_depart; }
    public function setConducteurId(?int $conducteur_id): void { $this->conducteur_id = $conducteur_id; }
}
