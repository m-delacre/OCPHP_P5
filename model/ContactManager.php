<?php

class ContactManager
{
    public function sendEmail(string $nom, string $prenom, string $email, string $message)
    {
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', 587);
        $to = "mdelacre@protonmail.com"; // this is your Email address
        $from = $email; // this is the sender's Email address
        $first_name = $prenom;
        $last_name = $nom;
        $subject = "Contact blog5";
        $message = $first_name . " " . $last_name . " vous a envoyé le message suivant :" . "\n\n" . $message;

        $headers = "From:" . $from;
        mail($to, $subject, $message, $headers);
    }
}
