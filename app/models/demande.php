<?php

class Demande {
    protected $id_expedeteur;
    protected $id_type;
    protected $id_annonce;
    protected $status;
    protected $longueur;
    protected $largeur;
    protected $hauteur;
    protected $poids;
    protected $depart;
    protected $destination;

    public function __construct($id_expedeteur = null, $id_type = null, $id_annonce = null, $status = null, $longueur = null, $largeur = null, $hauteur = null, $poids = null, $depart = null, $destination = null) {
        $this->id_expedeteur = $id_expedeteur;
        $this->id_type = $id_type;
        $this->id_annonce = $id_annonce;
        $this->status = $status;    
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
        $this->poids = $poids;
        $this->depart = $depart;
        $this->destination = $destination;
    }

    // Accesseur (Getters)
    public function getIdExpedeteur() {return $this->id_expedeteur;}
    public function getIdType() {return $this->id_type;}
    public function getIdAnnonce() {return $this->id_annonce;}
    public function getStatus() {return $this->status;}
    public function getLongueur() {return $this->longueur;}
    public function getLargeur() {return $this->largeur;}
    public function getHauteur() {return $this->hauteur;}
    public function getPoids() {return $this->poids;}
    public function getDepart() {return $this->depart;}
    public function getDestination() {return $this->destination;}

    // Modificateur (Setters)
    public function setIdExpediteur($id_expedeteur) { 
        if ($id_expedeteur !== null && $id_expedeteur > 0) {
            $this->id_expedeteur = $id_expedeteur;
        } else {
            throw new Exception("Le statut ne peut pas être null ou inferieur de zero.");
        }
    }

    public function setIdType($id_type) { 
        if ($id_type !== null && $id_type > 0) {
            $this->id_type = $id_type;
        } else {
            throw new Exception("Le statut ne peut pas être null ou inferieur de zero.");
        }
    }
    
    public function setIdAnnonce($id_annonce) { 
        if ($id_annonce !== null && $id_annonce > 0) {
            $this->id_annonce = $id_annonce;
        } else {
            throw new Exception("Le statut ne peut pas être null ou inferieur de zero.");
        }
    }

    public function setStatus($status) { 
        if ($status !== null) {
            $this->status = $status;
        } else {
            throw new Exception("Le statut ne peut pas être null.");
        }
    }

    public function setLongueur($longueur) { 
        if ($longueur !== null && $longueur > 0) {
            $this->longueur = $longueur;
        } else {
            throw new Exception("La longueur doit être un nombre positif.");
        }
    }

    public function setLargeur($largeur) { 
        if ($largeur !== null && $largeur > 0) {
            $this->largeur = $largeur;
        } else {
            throw new Exception("La largeur doit être un nombre positif.");
        }
    }

    public function setHauteur($hauteur) { 
        if ($hauteur !== null && $hauteur > 0) {
            $this->hauteur = $hauteur;
        } else {
            throw new Exception("La hauteur doit être un nombre positif.");
        }
    }

    public function setPoids($poids) { 
        if ($poids !== null && $poids > 0) {
            $this->poids = $poids;
        } else {
            throw new Exception("Le poids doit être un nombre positif.");
        }
    }

    public function setDepart($depart) { 
        if ($depart !== null) {
            $this->depart = $depart;
        } else {
            throw new Exception("Le lieu de départ ne peut pas être null.");
        }
    }

    public function setDestination($destination) { 
        if ($destination !== null) {
            $this->destination = $destination;
        } else {
            throw new Exception("La destination ne peut pas être null.");
        }
    }
}