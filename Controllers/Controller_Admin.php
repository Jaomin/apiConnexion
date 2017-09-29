<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/Models/Model_Admin.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/views/mail.php');

class Controller_Admin
{

    public function manageRequest()
    {

        if (isset($_POST['json'])) {
            $this->recupParticipants();
        }


        if (isset($_POST['choose'])) {
            $this->selectEvent();
        }


        if (isset ($_POST['addUser'])) {
            $this->addUser();
        }

        if (isset ($_POST['seeAllUsers'])) {
            $listAll = $this->listAllRegistrations();
        }
    }

    /**
     * the function prepare the array which will be use to add an item in the database.
     */
    public function addUser()
    {

        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])
            && !empty($_POST['hote'])
        ) {
            $nom = htmlspecialchars($_POST['nom']);

            $date_registration = date('Y-m-d H:i:s');


            $tab = array(
                'date_registration' => $date_registration,
                'nom' => $nom,
                'prenom' => htmlspecialchars($_POST['prenom']),
                'email' => htmlspecialchars($_POST['email']),
                'entreprise' => htmlspecialchars($_POST['entreprise']),
                'hote' => htmlspecialchars($_POST['hote'])
            );

            $add = new Model_Admin();
            $addUser = $add->addUser($tab);

        }
    }


    public function recupParticipants()
    {
        $authentifications = array(
            '0' => array('organisateur' => 'orga1', 'api_key' => 'api_key1', 'access_token' => 'access_token1', 'username' => 'mail1', 'password' => 'password1', 'id_event' => '251247'),
            '1' => array('organisateur' => 'zoopole', 'api_key' => 'api_key2', 'access_token' => 'access_token2', 'username' => 'mail2', 'password' => 'password2', 'id_event' => '251249')

        );


        foreach ($authentifications as $hote) {
            $tab = array();
            echo $api_key = $hote['api_key'];
            $id_event = $hote['id_event'];
            $username = $hote['username'];
            $password = $hote['password'];
            $res = $hote['access_token'];
            $url_requise = 'https://api.weezevent.com/participants?api_key=' . $api_key . '&access_token=' . $res . '&id_event[]=' . $id_event;
            echo $url_requise . '<br>';

            /*connexion à l'API*/

            $headers = array(
                "content-type:application/x-www/form-urlencoded;charset=utf-8"
            );
            $curl = curl_init($url_requise);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, 60);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            /* récupération des données*/
            $participants = curl_exec($curl);

            $json = json_decode($participants, true);


            foreach ($json['participants'] as $participant) {
                $event = $participant['id_event'];
                $mail = $participant['owner']['email'];
                $firstName = $participant['owner']['first_name'];
                $lastName = $participant['owner']['last_name'];
                $checkPaiement = $participant['paid'];
                $customize_url = "http://lecap.vitalac.eu/avis.php?firstName=" . $firstName . "&lastName=" . $lastName . '"';

                $tab[] = array(
                    'nom' => $lastName,
                    'prenom' => $firstName,
                    'hote' => $event,
                    'email' => $mail,
                    'url' => $customize_url
                );


            }
            sendEmail($tab);
        }
        return true;
    }


    public function selectEvent()
    {
        if (!empty ($_POST['code'])) {
            $code_rec = htmlspecialchars($_POST['code']);
            $code = array("orga1", "orga2");

            if (in_array($code_rec, $code)) {
                echo $code_rec;
                if ($code_rec == "orga1") {
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/api/views/moduleOrga1.php');
                } else {
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/api/views/moduleOrga2.php');
                }
            } else {
                $message = "veuillez resaisir votre code!";
                echo $message;
                require_once($_SERVER['DOCUMENT_ROOT'] . '/api/views/home.php');
            }
        } else {
            $message = "veuillez remplir le champs code!";
            echo $message;
        }

    }


    /*on récupère les données de notre base de données*/

    public function listAllRegistrations()
    {
        echo 'ok';
        $type = new Model_Admin();
        $myType = $type->allSubscriptions();
        require_once($_SERVER['DOCUMENT_ROOT'] . '/api/views/liste.php');
    }


}














