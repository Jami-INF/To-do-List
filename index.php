<?php

  require_once(__DIR__.'/config/Identification.php');
  require_once(__DIR__.'/config/Autoload.php');
  Autoload::charger();
  $connection = new indexGateway();
  $con = $connection->initalisationConnexion();
  require_once(__DIR__.'/controller/frontController.php');
  $cont = new frontController($con);
  // if(isset($_GET['action'])){
  //   echo 1;
    
  // }
  // else{
  //   echo 2;
  //   header(" Location: vueConnection.php");
  // }
?>
<!-- <!DOCTYPE html>
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
      <a class="butonacueil" href="?action=pageConnection">
        Connection
      </a>
    </header>
    <div class="main">
      <h1>To Do List</h1>
    </div>  
  </section>
  <script src="script.js"></script>
</body>
</html> -->
