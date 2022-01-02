<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct()
    {
      try{
        global $con;
        $username = 'root';
        $password = '';
        $dsn = 'localhost';
        $conname = 'todoux';
        $con = new Connection($dsn, $conname, $username, $password);
    }catch(PDOException $e){ 
        echo "connection refusé";
    } 
    }
  function AjoutTacheManuellement (string $nomTache, string $descriptionTache, int $idList, $con){
          $query = "INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES(:nomTache, :descriptionTache, :idList)";
//INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES ('nonn', 'dceve', 44)
          $con->executeQuery($query,array(
            ':nomTache' => array($nomTache, PDO::PARAM_STR),
            ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_INT),
          ));
    }
    function SupprimerTache (string $nomTache, string $descriptionTache, int $idList, $con){
      echo "SUPPRESSION EN COURS";
      $query = "DELETE FROM Todoux WHERE :nomTache = nomTache AND :descriptionTache = descriptionTache AND :idList = idList";
      $con->executeQuery($query, array(
        ':nomTache' => array($nomTache, PDO::PARAM_STR),
        ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
        ':idList' => array($idList, PDO::PARAM_INT)
      ));
      
    }
}
?>