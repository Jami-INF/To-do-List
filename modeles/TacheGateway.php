<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct()
    {
      global $con, $username, $password, $dsn, $dbname;
      try{
          if($con != null){

              $this->con = $con;
          }
          else{
              $this->con = new Connection($dsn, $dbname, $username, $password);
          }
      }catch(PDOException $e){ 
          echo "connection refusé";
      }  
    }
  function AjoutTacheManuellement (string $nomTache, string $descriptionTache, int $idList){
          $query = "INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES(:nomTache, :descriptionTache, :idList)";
//INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES ('nonn', 'dceve', 44)
          $this->con->executeQuery($query,array(
            ':nomTache' => array($nomTache, PDO::PARAM_STR),
            ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_INT),
          ));
    }
    function SupprimerTache (string $nomTache, string $descriptionTache, int $idList){
      echo "SUPPRESSION EN COURS";
      $query = "DELETE FROM Todoux WHERE :nomTache = nomTache AND :descriptionTache = descriptionTache AND :idList = idList";
      $this->con->executeQuery($query, array(
        ':nomTache' => array($nomTache, PDO::PARAM_STR),
        ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
        ':idList' => array($idList, PDO::PARAM_INT)
      ));
      
    }
}
?>