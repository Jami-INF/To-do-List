<?php
class UtilisateurGateway {
    private $con;
    public function __construct($con) {
              // require(__DIR__.'/../config/Autoload.php');
        // Autoload::charger();
        //global $username, $password, $dsn, $conname;
        global $con, $username, $password, $dsn, $dbname;
        try{
            if($con != null){

                $this->con = $con;
            }
            else{
                $this->con = new Connection($dsn, $dbname, $username, $password);
            }
        }catch(PDOException $e){ 
            echo "connection refusé";
        } 
        
    }

    public function addUser($email, $pswd){
        //global $con;
        //var_dump($con);
        $mdp = md5($pswd);
        $query = "INSERT INTO utilisateur (email, mdp) VALUES (:email, :mdp)";
        $this->con->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
    }

    public function findUser($email, $mdp){
        //global $con;
        $mdp = md5($mdp);
        $query = "SELECT idUser FROM utilisateur WHERE email = :email AND mdp = :mdp";
        $this->con->executeQuery($query, array(
            ':email' => array ($email,PDO::PARAM_STR),
            ':mdp' => array ($mdp,PDO::PARAM_STR)
        ));
        $resultat = $this->con->getResults(); 
        foreach ($resultat as $value) {
            $idUser = $value['idUser'];
            return $idUser;

        //$pswd = md5($_POST['password']); // md5 hashe le mot de passe, il faut comparer le mdp crypté avec le mot de passe en bdd issu de la requete
        }
    }
}
