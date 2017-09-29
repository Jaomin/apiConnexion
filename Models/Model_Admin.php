<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/api/library/database.php');


class Model_Admin
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * function which add the item in the database
     */
    public function addUser($tab)
    {

        $requete = "INSERT INTO registrations (date_registration, nom, prenom, email, entreprise,hote)
		VALUES (:date_registration,:nom, :prenom, :email, :entreprise, :hote)";
        $tableau = array(
            "date_registration" => $tab['date_registration'],
            "nom" => $tab['nom'],
            "prenom" => $tab['prenom'],
            "email" => $tab['email'],
            "entreprise" => $tab['entreprise'],
            "hote" => $tab['hote']
        );
        $resultat = $this->db->recup($requete, $tableau);
    }

    public function addMailing($tab)
    {
        $requete = "INSERT INTO questioned (nom,prenom,hote, email,url)
		VALUES (:nom,:prenom,:hote,:email, :url)";
        $tableau = array(
            "nom" => $tab['nom'],
            "prenom" => $tab['prenom'],
            "hote" => $tab['hote'],
            "email" => $tab['email'],
            "url" => $tab['url']
        );
        $resultat = $this->db->recup($requete, $tableau);

    }


    public function allSubscriptions()
    {
        echo 'ok';
        $req = ("SELECT * FROM registrations ORDER BY entreprise asc;");
        $tableau = array();
        $resultat = $this->db->recup($req, $tableau);
        echo '2';
        return $resultat;
    }
}









