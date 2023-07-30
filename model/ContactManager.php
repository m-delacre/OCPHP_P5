<?php

class ContactManager
{
    public function sendEmail(string $nom, string $prenom, string $email, string $message)
    {
        ini_set('SMTP', 'smtp.mail.yahoo.fr');
        ini_set('smtp_port', 587);
        $to = "mdelacre@protonmail.com"; // this is your Email address
        $from = $email; // this is the sender's Email address
        $first_name = $prenom;
        $last_name = $nom;
        $subject = "Contact blog5";
        $message = $first_name . " " . $last_name . " vous a envoyé le message suivant :" . "\n\n" . $message;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'Return-Receipt-To: ' . $from . '\r\n';
        $headers .= 'To: <' . $to . '>\r\n';
        $headers .= 'From: ' . $from . '>' . '\r\n';
        if (mail($to, $subject, $message, $headers)) {
            echo "mail sent";
        } else {
            echo "echec";
        }
    }
}
