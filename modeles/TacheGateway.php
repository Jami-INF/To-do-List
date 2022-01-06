<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct($con)
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
    function ajouterTache(string $nomTache, string $descriptionTache){
      $query="INSERT INTO todoux(nomTache, descriptionTache, idList, estCochee) VALUES (:nomTache,:descriptionTache,:idList, 0)";
      $this->con->executeQuery($query,array(
        ':nomTache' => array($nomTache, PDO::PARAM_STR),
        ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
        ':idList' => array($_GET['list'], PDO::PARAM_INT),
      ));
      require(__DIR__.'/../viewListe.php');
      header('Location: ?list='.$_GET['list']);
    }
    
    function SupprimerTache (int $idTache){
      $query = "DELETE FROM Todoux WHERE :idTache = idTache";
      $this->con->executeQuery($query, array(
        ':idTache' => array($idTache, PDO::PARAM_INT)
      ));
      
    }
}
?>