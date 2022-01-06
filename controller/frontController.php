<?php

class FrontController {
    private $String_actor = "";
    private $listeActions = array(
        'Utilisateur' => array('Invite','pageListe','NewListePage','NewTachePage','pageConnection','Accueil','pageInscription','pageInscription','connection', 'inscription', 'Deconnexion', 'creerListe', 'creerTache', 'validerTache', 'supprimerListe', 'supprimerTache'),
        'Administrateur' => array('supprimerUtilisateur' ) );

    public function __construct()
    {
        global $con;
        session_start();
        try {
            if (empty($_GET['action'])) {
                $action = null;
            } else {
                $action = $_GET['action'];
            }
            $this->String_actor = $this->isAdmin($action);
            if ($this->String_actor != '') {
                if ($this->String_actor == 'Administrateur') {
                    if(! empty($_SESSION)){
                        new ControllerAdmin($con, $action);
                    }
                }
                if ($this->String_actor == 'Utilisateur') {
                    new ControllerUser($con, $action);
                }
            } else {
                require(__DIR__ . '/../vueConnection.php');
            }
        } catch (PDOException $pdoErreur) {
            $dataVueErreur[] = "Erreur de PDO";
            require_once(__DIR__ . '/../vues/vueErreur.php');
        } catch (Exception $erreur) {
            $dataVueErreur[] = "Erreur inattendue";
            require_once(__DIR__ . '/../vues/vueErreur.php');
        }
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