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
    <div class="main">
    <a href="index.php">
        <h1>ToDoux Liste</h1>
      </a>
    <h2>Inscription</h2>
    <div class="formulaire">
      <form class="form-add-list" action="inscription.php" method="post">
        <input type="email" name="adresse_mail" placeholder="Adresse Email">
        <input type="email" name="verif_adresse_mail" placeholder="Retaper l'adresse Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="verif_password" placeholder="Retaper le mdp">
        <input type="submit" name="submitInscription" value="Inscription">
      </form>
    </div>


      <a class="butonacueil" href="connection.php">
        <button type="button" name="button" class="btn btn-primary" id="btn">Connection</button>
      </a>
      <a class="butonacueil" href="accueil.php">
        <button type="button" name="Invité" class="btn btn-primary" id="btn">Invité</button>
      </a>

      <?php
        require_once(__DIR__.'/controller/inscriptionConnectionController.php');
        require (__DIR__.'/modeles/indexGateway.php');
  
        $icController = new inscriptionConnectionController();
        $icController->inscription($db);
      ?>
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>