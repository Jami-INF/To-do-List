<?php

class controllerUser{
    private $con;
    private $action;
    public function __construct($con, $action){
        $this->con = $con;
        $this->action = $action;
        switch ($this->action){
            case 'connection':
                $this->connection();
                break;
            case 'inscription':
                $this->inscription();
                break;
            case 'Accueil':
                require(__DIR__ . '/../accueil.php');
                break;
            case 'pageConnection':
                require(__DIR__ . '/../vueConnection.php');
                break;
            case 'NewTachePage':
                require(__DIR__ . '/../newTache.php');
                break;
            case 'NewListePage':
                require(__DIR__ . '/../newList.php');
                break;
            case 'pageInscription':
                require(__DIR__ . '/../inscription.php');
                break;
            // case null:
            //     header('Location: vueConnection.php?action=con');
            //     echo 'init';
            //     break;
            // default:
            // header('Location: vueConnection.php');
            //     break;
            }
    }
    public function connection (){
        $insc = new inscriptionConnectionController($this->con);
        $insc->connection();
    }
    public function inscription(){
        $insc = new inscriptionConnectionController($this->con);
        $insc->inscription();
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