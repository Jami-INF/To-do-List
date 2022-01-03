<?php

class controllerUser{
    private $con;
    private $action;
    public function __construct($con, $action){
        $this->con = $con;
        $this->action = $action;
        switch ($role){
            case 'connection':
                $this->connection();
                break;
            }
    }
    public function connection (){
        inscriptionConnectionController::connection($con);
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