<?php

class FrontController {
    private $String_actor = "";
    private $listeActions = array(
        'Utilisateur' => array('pageConnection','pageInscription','Connexion', 'inscription', 'Deconnexion', 'creerListe', 'creerTache', 'validerTache', 'supprimerListe', 'supprimerTache'),
        'Administrateur' => array('supprimerUtilisateur' ) );
    private $con ;

    public function __construct($con)
    {
        $this->con = $con;
        session_start();
        try {
            if (empty($_GET['action'])) {
                $action = null;
                echo 'action est vide</br>';
            } else {
                $action = $_GET['action'];
                echo 'action est pas vide</br>';
            }
            echo "FrontController avant </br>";
            new ControllerUser($con, $action);
            echo "FrontController apres </br>";
            
        } catch (Exception $erreur) {
            $dataVueErreur[] = "Erreur inattendue";
            require_once(__DIR__ . '/../vues/erreur.php');
        }


        // $this->con = $con;
        // session_start();
        // try {
        //     if (empty($_GET['action'])) {
        //         $action = null;
        //     } else {
        //         $action = $_GET['action'];
        //     }
        //     $this->String_actor = $this->isAdmin($action);
        //     if ($this->String_actor != '') {
        //         if ($this->String_actor == 'Administrateur') {
        //             if(! empty($_SESSION) )
        //                 new ControllerAdmin($con, $action);
        //             else{
        //                 require(__DIR__ . '/../vues/VueConnexion.php');
        //                 return;
        //             }
        //         }
        //         if ($this->String_actor == 'Utilisateur') {
        //             new ControllerUser($con, $action);
        //         }
        //     } else {
        //         new ControllerUser($con, $action);
        //     }
        // } catch (PDOException $pdoErreur) {
        //     $dataVueErreur[] = "Erreur de PDO";
        //     require_once(__DIR__ . '/../vues/erreur.php');
        // } catch (Exception $erreur) {
        //     $dataVueErreur[] = "Erreur inattendue";
        //     require_once(__DIR__ . '/../vues/erreur.php');
        // }


        // if($role == 'Utilisateur'){
        //     switch ($role){
        //         case 'connection':
    
        //     }
    
        // }elseif($role == 'Administrateur'){
        //     switch ($role){
        //         case 'supprimerUtilisateur':
        //             controllerAdmin::supprimerUtilisateur($con, $login);
        //             break;
        //         case 

        //     }
        // }


    }

    private function isAdmin($action)
    {
        if (in_array($action, $this->listeActions['Utilisateur'])) {
            return 'Utilisateur';
        }
        if (in_array($action, $this->listeActions['Administrateur'])) {
            return 'Administrateur';
        }
        return "";
    }

    
}