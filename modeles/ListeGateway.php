<?php


class ListeGateway{
private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function addList($nomList){
    
        echo 1;
        $query = "INSERT INTO `list`(`nomList`) VALUES (:nomList)";
        
        echo 2;
        $this->connexion->executeQuery($query, array(
            ':nomList' => array($nomList, PDO::PARAM_STR)));
        echo ('inssertion réussi');
    }

}
?>