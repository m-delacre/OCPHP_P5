<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes and create a new PHPMailer instance.
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

class MDMail
{
    public static function sendMail(string $senderMail, string $nom, string $prenom, string $message)
    {
        $mail = new PHPMailer(true); // Passing `true` enables exceptions.

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host =  'smtp.gmail.com'; // Your SMTP server address.
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME; // Your SMTP username (usually your email address).
            $mail->Password = SMTP_PASSWORD; // Your SMTP password.
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` for SSL.
            $mail->Port = 587; // TCP port to connect to (587 for STARTTLS, 465 for SSL).

            // Email content
            $mail->setFrom($senderMail, $nom . " " . $prenom); // Set the 'From' email address and name.
            $mail->addAddress(MAIL_RECIPIENT, 'Recipient Name'); // Add a recipient.
            $mail->addReplyTo($senderMail, $nom . $prenom); // Add a 'Reply-To' address.

            $mail->isHTML(true); // Set email format to HTML.
            $mail->Subject = 'contact blog5';
            $mail->Body = "Message de : " . $senderMail . "\\n" . $nom . " " . $prenom . "\\n" . " Message : " . $message;

            // Optional: Add attachments.
            // $mail->addAttachment('/path/to/file.pdf', 'Filename.pdf');

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
