<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    private $sujet;
    private $destinateur_nom;
    private $email_nom;
    private $destinataire;
    private $message;
    private $mail;

    public function __construct($sujet, $destinateur_nom, $email_nom, $destinataire, $message) {
        $this->sujet = $sujet;
        $this->destinateur_nom = $destinateur_nom;
        $this->email_nom = $email_nom;
        $this->destinataire = $destinataire;
        $this->message = $message;

        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; 
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'khadijasahnoun46@gmail.com'; 
        $this->mail->Password = 'ncln bbio eote btwi'; 
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $this->mail->Port = 587 ;
        $this->mail->CharSet = 'UTF-8'; 
    }

    public function envoyerEmail() {
        try {
            $this->mail->setFrom($this->email_nom, $this->destinateur_nom);
            $this->mail->addAddress($this->destinataire);
            $this->mail->addReplyTo($this->email_nom, $this->destinateur_nom);

            $this->mail->isHTML(true);
            $this->mail->Subject = $this->sujet;
            $this->mail->Body = $this->message;
            $this->mail->AltBody = strip_tags($this->message); 

            $this->mail->send();
            return "E-mail envoyé avec succès à {$this->destinataire} !";
        } catch (Exception $e) {
            return "Erreur lors de l'envoi de l'e-mail : " . $this->mail->ErrorInfo;
        }
    }
}