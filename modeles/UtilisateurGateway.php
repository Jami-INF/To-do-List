<?php
class UtilisateurGateway {

    public function __construct() {
        
    }

    public function addUser($email, $pswd){
        global $db;
        //var_dump($db);
        $mdp = md5($pswd);
        $query = "INSERT INTO utilisateur (email, mdp) VALUES (:email, :mdp)";
        $db->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
    }

    public function findUser($email, $mdp){
        global $db;
        $mdp = md5($mdp);
        $query = "SELECT idUser FROM utilisateur WHERE email = :email AND mdp = :mdp";
        $db->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
        $resultat = $db->getResults(); 
        foreach ($resultat as $value) {
            $idUser = $value['idUser'];
            return $idUser;

        //$pswd = md5($_POST['password']); // md5 hashe le mot de passe, il faut comparer le mdp crypté avec le mot de passe en bdd issu de la requete
        }
    }
}
