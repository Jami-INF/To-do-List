<?php
  require_once (__DIR__.'/modeles/indexGateway.php');
  //autoloader pour instancier la var global $db
  $indexGateway = new indexGateway();
  $indexGateway->initalisationConnexion();
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
      <a class="butonacueil" href="connection.php">
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
