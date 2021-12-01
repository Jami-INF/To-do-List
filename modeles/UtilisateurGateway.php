<?php
class UtilisateurGateway {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function addUser($email, $mdp, $con){
        $query = "INSERT INTO utilisateur (email, mdp) VALUES (:email, :mdp)";
        $con->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
    }

    public function findUser($email, $mdp, $con){
        $query = "SELECT idUser FROM utilisateur WHERE email = :email AND mdp = :mdp";
        $con->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
        $resultat = $con->getResults(); 
        foreach ($resultat as $value) {
            $idUser = $value['idUser'];
            return $idUser;
        }
    }
}
?>