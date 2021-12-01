<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct(Connection $con){
    $this->con = $con;
    //parent::__construct($idList, $nomTache, $descriptionTache);
  }
  function AjoutTacheManuellement (string $nomTache, string $descriptionTache, int $idList, $db){

          $query = "INSERT INTO Todoux VALUES(:nomTache, :descriptionTache, :idList)";

          $db->executeQuery($query,array(
            ':nomTache' => array($nomTache, PDO::PARAM_STR),
            ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_INT),
          ));
    }
    function SupprimerTache (string $nomTache, string $descriptionTache, int $idList, $db){
      echo "SUPPRESSION EN COURS";
      /*echo $idTache;
      $query = "DELETE FROM Todoux WHERE :idTache = idTache";
      $db->executeQuery($query, array(
        ':idTache' => array($idTache, PDO::PARAM_INT),
      ));
      */
    }
}
?>