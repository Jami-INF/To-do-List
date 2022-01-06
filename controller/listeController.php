<?php
    class listeController{
      private $con;
        public function __construct(){
        }

        public function ajouterTache(){
            $listeGateway = new ListeGateway();
            $listeGateway->ajouterTacheDansListe();
        }
        public function afficherTitre(){
            $listeGateway = new ListeGateway();
            $listeGateway->afficherTitre();
        }
        
    }
?>