<?php

class FrontController {
    private $String_actor = "";
    private $listeActions = array(
        'Utilisateur' => array('NewListePage','NewTachePage','pageConnection','Accueil','pageInscription','pageInscription','connection', 'inscription', 'Deconnexion', 'creerListe', 'creerTache', 'validerTache', 'supprimerListe', 'supprimerTache'),
        'Administrateur' => array('supprimerUtilisateur' ) );
    // private $con ;

    public function __construct()
    {
        global $rep, $vues, $con;
        //$this->con = $con;
        session_start();
        // try {
        //     if (empty($_GET['action'])) {
        //         $action = null;
        //         echo 'action est vide</br>';
        //     } else {
        //         $action = $_GET['action'];
        //         echo 'action est pas vide</br>';
        //     }
        //     echo "FrontController avant </br>";
        //     new ControllerUser($con, $action);
        //     echo "FrontController apres </br>";
            
        // } catch (Exception $erreur) {
        //     $dataVueErreur[] = "Erreur inattendue";
        //     require_once(__DIR__ . '/../vues/erreur.php');
        // }

        // try {

        //     if(in_array($action, $tabUser)) {
        //         if(!isset($_SESSION["Utilisateur"])) {
        //             new UtilisateurControleur();
        //         } else {
        //             new UtilisateurControleur();
        //         }
        //     } else if(in_array($action, $tabPublique) || $action == NULL) {
        //         new PubliqueControleur();
        //     } else {
        //         $dataPageErreur['erreurAppel'] = "Erreur d'appel php";
        //         require($rep . $vues['erreur']);
        //     }

        // } catch (PDOException $e) {
        //     // $dataPageErreur[] = "Erreur BDD ! ";
        //     require($rep . $vues['erreur']);
        //     return;
        // } catch (\Exception $e2) { // Récupération des erreurs venant du modèle et de l'interaction avec la BDD
        //     // $dataPageErreur[] = "Erreur métier ! ";
        //     require($rep . $vues['erreur']);
        //     return;
        // }

        // $this->con = $con;
        // session_start();
        try {
            if (empty($_GET['action'])) {
                $action = null;
            } else {
                $action = $_GET['action'];
            }
            $this->String_actor = $this->isAdmin($action);
            if ($this->String_actor != '') {
                if ($this->String_actor == 'Administrateur') {
                    if(! empty($_SESSION) )
                        new ControllerAdmin($con, $action);
                    else{
                        // require(__DIR__ . '/vueConnexion.php');
                        // return;
                    }
                }
                if ($this->String_actor == 'Utilisateur') {
                    new ControllerUser($con, $action);
                }
            } else {
                //require($rep . $vues['Connection']);
                //new ControllerUser($con, $action);
                require(__DIR__ . '/../vueConnection.php');
                // $action = 'pageConnection';
                // new ControllerUser($con, $action);
            }
        } catch (PDOException $pdoErreur) {
            $dataVueErreur[] = "Erreur de PDO";
            require_once(__DIR__ . '/../vues/vueErreur.php');
        } catch (Exception $erreur) {
            $dataVueErreur[] = "Erreur inattendue";
            require_once(__DIR__ . '/../vues/vueErreur.php');
        }


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