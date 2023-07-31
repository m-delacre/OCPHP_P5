<?php

class ContactManager
{
    public function sendEmail($nom,  $prenom,  $email,  $message)
    {
        ini_set('sendmail_path', 'C:\wamp64\sendmail\sendmail.exe -t -i');
        ini_set('SMTP', 'smtp.mail.yahoo.fr');
        ini_set('smtp_port', 587);
        /*$to = "matthieu.delacre@yahoo.fr"; // this is your Email address
        $from = $email; // this is the sender's Email address
        $first_name = $prenom;
        $last_name = $nom;
        $subject = "Contact blog5";
        $message = $first_name . " " . $last_name . " vous a envoyé le message suivant :" . "\n\n" . $message;
        $headers = "From: ". $email ."\r\n";
        $headers .= "Reply-To: ". $email ."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
        if (mail($to, $subject, $message, $headers)) {
            echo "mail sent";
        } else {
            echo "echec";
        }*/

        // Recipient email address
        $recipient = 'stazdelacre@gmail.com';

        // Email headers and content
        $headers = "From: mdelacre@protonmail.com\r\n";
        $headers .= "Reply-To: mdelacre@protonmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        $subject = 'Email de blog5';
        $message = 'This is a test email sent via sendmail with ssl in PHP.';

        // Open a secure connection with recipient's mail server using stream_socket_client
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
                'crypto_method' => STREAM_CRYPTO_METHOD_SSLv3_CLIENT,
            ],
        ]);

        // Open the connection to recipient's mail server
        $stream = stream_socket_client('smtp.mail.yahoo.fr:587', $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $context);

        if (!$stream) {
            echo "Failed to connect to the mail server: $errstr ($errno)";
        } else {
            // Send the email via sendmail
            fwrite($stream, "EHLO example.com\r\n");
            fwrite($stream, "STARTTLS\r\n");
            fwrite($stream, "EHLO example.com\r\n");
            fwrite($stream, "MAIL FROM: <mdelacre@protonmail.com>\r\n");
            fwrite($stream, "RCPT TO: <$recipient>\r\n");
            fwrite($stream, "DATA\r\n");
            fwrite($stream, "$headers\r\n");
            fwrite($stream, "Subject: $subject\r\n");
            fwrite($stream, "\r\n");
            fwrite($stream, "$message\r\n");
            fwrite($stream, ".\r\n");
            fwrite($stream, "QUIT\r\n");

            // Close the connection
            fclose($stream);
            echo "Email sent successfully!";
        }
    }
}
