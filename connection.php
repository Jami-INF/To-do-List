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
  <header>
    <div class="main">
      <a href="index.php">
        <h1>ToDoux Liste</h1>
      </a>
  <section>
    <div class="main">
      <h2>Connection</h2>
      <div class="formulaire">
        <form class="form-add-list" action="connection.php" method="post">
          <input type="email" name="adresse_mail" placeholder="Adresse Email">
          <input type="password" name="password" placeholder="Mot de passe">
          <input type="submit" name="submitConnexion" value="Connexion">
        </form>
      </div>
     
      <a class="butonacueil" href="inscription.php">
        <button type="button" name="button" class="btn btn-primary" id="btn">Inscription</button>
      </a>
      <a class="butonacueil" href="accueil.php">
        <button type="button" name="Invité" class="btn btn-primary" id="btn">Invité</button>
      </a>
    <?php
      require_once(__DIR__.'/controller/inscriptionConnectionController.php');
      require (__DIR__.'/modeles/indexGateway.php');
      
      $icController = new inscriptionConnectionController();
      $icController->connection($db);
    ?>
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>
