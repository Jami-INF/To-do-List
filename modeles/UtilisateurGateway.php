<?php
class UtilisateurGateway {
    

    public function __construct($con) {
        $this->connexion = $con;
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

        $pswd = md5($_POST['password']); // md5 hashe le mot de passe, il faut comparer le mdp crypté avec le mot de passe en bdd issu de la requete
        }
    }
}
?>