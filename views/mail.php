<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/Controllers/Controller_Admin.php');

use \Mailjet\Resources;

require_once($_SERVER['DOCUMENT_ROOT'] . '/api/vendor/autoload.php');


function sendEmail($tab)
{

    foreach ($tab as $destinataire) {
        $nom = $destinataire['nom'];
        $prenom = $destinataire['prenom'];
        $hote = $destinataire['hote'];
        $email = $destinataire['email'];
        $lien = $destinataire['url'];

        $apikey = "api_key mailjet";
        $apisecret = "api_secret mailjet";
        $mj = new \Mailjet\Client($apikey, $apisecret);
        $response = $mj->get(Resources::$Contact);
        if ($response->Success()) {
            echo 'all is all right!<br>';

        } else {
            echo 'this is the end!<br>';
            var_dump($response->getStatus());
        }
        $filters = ['Limit' => '150'];

        $response = $mj->get(Resources::$Contact, ['filters' => $filters]);

        $body = [

            'FromEmail' => "expéditeurEmail",
            'FromName' => "",
            'Subject' => "acces formulaire",
            'Text-part' => "veuillez répondre à cette série de questions pour accéder aux documents",
            'Html-part' => "<h3>Dear passenger, welcome to Mailjet!</h3><br />May the delivery force be with you!",
            'Recipients' => [['Email' => $email]]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
    }

}


?>



	