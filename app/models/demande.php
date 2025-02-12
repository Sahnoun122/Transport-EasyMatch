<?php

class Demande {
    protected $id;
    protected $status;
    protected $longueur; // Corrected spelling
    protected $largeur;
    protected $hauteur;
    protected $poids;
    protected $depart;
    protected $destination;

    public function __construct($id = null, $status = null, $longueur = null, $largeur = null, $hauteur = null, $poids = null, $depart = null, $destination = null) {
        $this->id = $id;
        $this->status = $status;    
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
        $this->poids = $poids;
        $this->depart = $depart;
        $this->destination = $destination;
    }

    // Accesseur (Getters)
    public function getId() { return $this->id; }
    public function getStatus() { return $this->status; }
    public function getLongueur() { return $this->longueur; }
    public function getLargeur() { return $this->largeur; }
    public function getHauteur() { return $this->hauteur; }
    public function getPoids() { return $this->poids; }
    public function getDepart() { return $this->depart; }
    public function getDestination() { return $this->destination; }

    // Modificateur (Setters)
    public function setStatus($status) { 
        if ($status != null) {
            $this->status = $status;
        }
    }
    public function setLongueur($longueur) { 
        if ($longueur != null && $longueur > 0) {
            $this->longueur = $longueur;
        }
    }
    public function setLargeur($largeur) { 
        if ($largeur != null && $largeur > 0) {
            $this->largeur = $largeur;
        }
    }
    public function setHauteur($hauteur) { 
        if ($hauteur != null && $hauteur > 0) {
            $this->hauteur = $hauteur;
        }
    }
    public function setPoids($poids) { 
        if ($poids != null && $poids > 0) {
            $this->poids = $poids;
        }
    }
    public function setDepart($depart) { 
        if ($depart != null) {
            $this->depart = $depart;
        }
    }
    public function setDestination($destination) { 
        if ($destination != null) {
            $this->destination = $destination;
        }
    }
}