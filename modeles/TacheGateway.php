<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct(Connection $con){
    $this->con = $con;
    //parent::__construct($idTache, $idList, $titre, $description);
  }
  function AjoutTacheManuellement (string $titre, string $description, int $idList, $db){

          $count = $db->query('SELECT count(*) as nb FROM Todoux');
          $data = $count->fetch();
          $idTache = ($data['nb'] +1);

          echo $idTache;
          $query = "INSERT INTO Todoux VALUES(:titre, :description, :idTache, :idList)";

          $db->executeQuery($query,array(
            ':titre' => array($titre, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':idTache' => array($idTache, PDO::PARAM_INT),
            ':idList' => array($idList, PDO::PARAM_INT),
          ));
    }
    function SupprimerTache (string $titre, string $description, int $idTache, int $idList, $db){
      echo "SUPPRESSION EN COURS";
      echo $idTache;
      $query = "DELETE FROM Todoux WHERE :idTache = idTache";
      $db->executeQuery($query, array(
        ':idTache' => array($idTache, PDO::PARAM_INT),
      ));
    }
}
?>