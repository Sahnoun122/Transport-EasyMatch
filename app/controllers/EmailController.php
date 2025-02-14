<?php
namespace App\Controllers;

use App\Models\Email;

class EmailController {
    private $email;

    public function __construct($sujet, $destinateur_nom, $email_nom, $destinataire, $message) {
        $this->email = new Email($sujet, $destinateur_nom, $email_nom, $destinataire, $message);
    }

    public function envoyer() {
        return $this->email->envoyerEmail();
    }
}