<?php

  require_once(__DIR__.'/config/Identification.php');
  require_once(__DIR__.'/config/Autoload.php');
  Autoload::charger();

  //require_once(__DIR__.'/controller/frontController.php');
  $cont = new frontController();

  //autoloader pour instancier la var global $con
  //$indexGateway = new indexGateway();
  //$indexGateway->initalisationConnexion();

  /*AUTOLOADER
  //si controller pas objet
  //  header('Location: controller/controller.php');

  //si controller objet

  //chargement config
  require_once(__DIR__.'/config/config.php');

  //chargement autoloader pour autochargement des classes
  require_once(__DIR__.'/config/Autoload.php');
  Autoload::charger();

  $cont = new Controleur();
  */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ToDoux Liste </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <section>
    <header>
      <a class="butonacueil" href="inscription.php">
        <button type="button" name="button" class="btn btn-primary" id="btn">Inscription</button>
      </a>
      <a class="butonacueil" href="accueil.php">
        <button type="button" name="Invité" class="btn btn-primary" id="btn">Invité</button>
      </a>
      <a class="butonacueil" href="vueConnection.php">
        <button type="button" name="button" class="btn btn-primary" id="btn">Connection</button>
      </a>
    </header>
    <div class="main">
      <h1>To Do List</h1>
    </div>  
  </section>
  <script src="script.js"></script>
</body>
</html>
