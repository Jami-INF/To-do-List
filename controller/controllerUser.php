<?php

class controllerUser{
    private $con;
    private $action;
    public function __construct($con, $action){
        $this->con = $con;
        $this->action = $action;
        switch ($this->action){
            case 'Deconnexion':
                $this->deconnection();
                break;
            case 'connection':
                $this->connection();
                break;
            case 'inscription':
                $this->inscription();
                break;
            case 'Accueil':
                require(__DIR__ . '/../vues/accueil.php');
                break;
            case 'Invite':
                require(__DIR__ . '/../vues/accueil.php');
                $_SESSION['idUser']=0;
                break;
            case 'pageConnection':
                require(__DIR__ . '/../vues/vueConnection.php');
                break;
            case 'pageListe':
                require(__DIR__ . '/../vues/viewListe.php');
                $this->getIdListe();
                break;
            case 'NewTachePage':
                require(__DIR__ . '/../vues/newTache.php');
                break;
            case 'NewListePage':
                require(__DIR__ . '/../vues/newList.php');
                break;
            case 'pageInscription':
                require(__DIR__ . '/../vues/inscription.php');
                break;
            case 'creerListe':
                $this->creerListe();
                break;
            case 'creerTache':
                $this->creerTache();
                break;
            case 'supprimerTache':
                $this->supprimerTache();
                break;
            case 'supprimerListe':
                $this->supprimerListe();
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
    public function creerListe(){
        filter_var($_POST['nomListe'], FILTER_SANITIZE_STRING);
    
        if(isset($_POST['submitListe'])){
            if(isset($_POST['nomListe'])){
                $nomListe = $_POST['nomListe'];
                $liste = new ListeGateway();
                $liste->addList($nomListe);
                //$liste->getList();
            }else{
                echo "Veuillez remplir le nom de la liste";
            }
        }
        require(__DIR__ . '/../vues/newList.php');
    }
    public function isUser(){
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){
            return true;
        }
        return false;
    }
    public function getIdListe(){
        $liste = new ListeGateway();
        $liste->getList();
    }
    public function creerTache(){
        filter_var($_POST['nomTache'], FILTER_SANITIZE_STRING);
        filter_var($_POST['descriptionTache'], FILTER_SANITIZE_STRING);

        if (isset($_POST['submitNewTache'])) {
        $tache = new TacheGateway($this->con);
        $tache->ajouterTache($_POST['nomTache'], $_POST['descriptionTache'], $this->con);
        
        }
    }
    public function deconnection(){
        $_SESSION = array();
        session_unset();
        session_destroy();
        require(__DIR__ . '/../vues/vueConnection.php');
    }
    public function supprimerTache(){
        $idTache = $_GET['idTache'];
        echo $idTache;
        $tache = new TacheGateway($this->con);
        $tache->SupprimerTache($idTache);
        require(__DIR__ . '/../vues/viewListe.php');
        header('Location: ?list='.$_GET['list']);
    }
    public function supprimerListe(){
        $idListe = $_GET['list'];
        $liste = new ListeGateway();
        $liste->supprimerListe($idListe);
        require(__DIR__ . '/../vues/accueil.php');
        // header('Location: ?list='.$_GET['list']);
    }

}
?>