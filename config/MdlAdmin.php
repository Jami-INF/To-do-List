<?php

public class ModelAdmin{
    public function __construct(){
        global $con;
        $utilisateurGate    way = new UtilisateurGateway($con);

    }
    public function connection ($login, $password){
        $utilisateurGateway = new UtilisateurGateway($con, $login, $password);
        validation :: nettoyerchaine($login);
        validation :: nettoyerchaine($password);
        $loginDB = this->utilisateurGateway->getLogin();
        $passwordDB = this->utilisateurGateway->getPassword();
        if($login == $loginDB && password_verify($password, $passwordDB)){
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
        }
        else{
            require dVue['Erreur'];
        }

    }
    public function isAdmin(){
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
            return true;
        }
        return false;
    }
    public function deconnection(){
        $_SESSION = array();
        session_unset();
        session_destroy();
    }

}
?>