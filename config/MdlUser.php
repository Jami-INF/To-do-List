<?php

public class ModelUser{
    public function __construct(){
        global $con;
        $utilisateurGateway = new UtilisateurGateway($con);

    }
    public function connection ($login, $password){
        $utilisateurGateway = new UtilisateurGateway($con, $login, $password);
        validation :: nettoyerchaine($login);
        validation :: nettoyerchaine($password);
        $loginDB = this->utilisateurGateway->getLogin();
        $passwordDB = this->utilisateurGateway->getPassword();
        if($login == $loginDB && password_verify($password, $passwordDB)){
            $_SESSION['role'] = 'user';
            $_SESSION['login'] = $login;
        }
        else{
            require dVue['Erreur'];
        }

    }
    public function isUser(){
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){
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