<?php
class controller {
    //class controller TD2 cours de PHP
    public function __construct() {
        globalc $rep, $vues;
        $vueerreur = array();
        try {
            $action = $_REQUEST['action'];//tester si il est opas vide
            switch ($variable) {
                case NULL:
                    $this->Reinitialiser();
                    break;

                case 'ListeNews':
                    $this->ListeNews($vueerreur);
                    break;
                

                default:
                    $dVueerreur[] = "Erreur d'appel php";
                    require($rep.$vues['vueBase.php']);
                    break;
            }
            
        }
        catch(Exception $e){
            $dVueerreur[] = "Erreur d'appel php";
            require($rep.$vues['vueBase.php']);
            break;
        }
        
    }
    function listNews(array $dVueerreur) {
        global $rep, $vues;

    }

    
}
?>