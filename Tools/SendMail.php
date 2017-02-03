<?php

namespace Marmiton\Tools;

/**
* SendMail
*/
class SendMail
{
    public function mail_confirmation($email)
    {
        $to = $email;
        $subject = 'Mail de Confirmation';
        $message = "Bonjour $email,\n\nVotre recette a bien etais prise en compte";
        $headers = 'From: Marmiton Team Etna' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "mail de Confirmation bien envoyer!\n";
        }
        else {
            echo "Votre message n'a pas pu être envoyé \n";
        }
    }
}
