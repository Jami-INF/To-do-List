<?php

  require_once(__DIR__.'/config/Identification.php');
  require_once(__DIR__.'/config/Autoload.php');
  Autoload::charger();
  // $connection = new indexGateway();
  // $con = $connection->initalisationConnexion();
  $cont = new frontController();

?>