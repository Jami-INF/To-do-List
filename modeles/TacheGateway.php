<?php

class TacheGateway extends Tache{
  private $con;
  public function __construct(Connection $con){
    $this->con = $con;
    //parent::__construct($idList, $nomTache, $descriptionTache);
  }
  function AjoutTacheManuellement (string $nomTache, string $descriptionTache, int $idList, $db){
          $query = "INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES(:nomTache, :descriptionTache, :idList)";
//INSERT INTO `todoux`(`nomTache`, `descriptionTache`, `idList`) VALUES ('nonn', 'dceve', 44)
          $db->executeQuery($query,array(
            ':nomTache' => array($nomTache, PDO::PARAM_STR),
            ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
            ':idList' => array($idList, PDO::PARAM_INT),
          ));
    }
    function SupprimerTache (string $nomTache, string $descriptionTache, int $idList, $db){
      echo "SUPPRESSION EN COURS";
      /*$query = "DELETE FROM Todoux WHERE :nomTache = nomTache AND :descriptionTache = descriptionTache AND :idList = idList";
      $db->executeQuery($query, array(
        ':nomTache' => array($nomTache, PDO::PARAM_STR),
        ':descriptionTache' => array($descriptionTache, PDO::PARAM_STR),
        ':idList' => array($idList, PDO::PARAM_INT)
      ));*/
      
    }
}
?>