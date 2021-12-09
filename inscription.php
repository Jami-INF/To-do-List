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
          require_once(__DIR__.'/config/Connection.php');
          require (__DIR__.'/modeles/Utilisateur.php');
          require (__DIR__.'/modeles/UtilisateurGateway.php');


          try{
          $username = 'root';
          $password = '';
          $dsn = 'localhost';
          $dbname = 'todoux';
          $db = new Connection($dsn, $dbname, $username, $password);
          echo "connection réussi";
          }catch(PDOException $e){ 
            echo "connection refusé";
          }






          filter_var($_POST['adresse_mail'], FILTER_VALIDATE_EMAIL);
          filter_var($_POST['verif_adresse_mail'], FILTER_VALIDATE_EMAIL);
          filter_var($_POST['password'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{6,}$/")));
          filter_var($_POST['verif_password'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{6,}$/")));
          echo $_POST['adresse_mail'];
          echo $_POST['verif_adresse_mail'];
          echo $_POST['password'];
          echo $_POST['verif_password'];
          $expression = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
          // !empty($_POST['adresse_mail']) && !empty($_POST['verif_adresse_mail']) && 

          if(isset($_POST['submitInscription'])){
            if(!empty($_POST['password']) && !empty($_POST['verif_password'])){
              if(!empty($_POST['adresse_mail'])){
                if(!empty($_POST['verif_adresse_mail'])){
                  if($_POST['adresse_mail'] == $_POST['verif_adresse_mail']){
                    if($_POST['password'] == $_POST['verif_password']){
                      $pswd = md5($_POST['password']);


                      $utilisateur = new Utilisateur($_POST['adresse_mail'],$pswd);
                      $utilisateurGateway = new UtilisateurGateway($db);
                      $utilisateurGateway->addUser($utilisateur->getEmail(),$utilisateur->getMotDePasse(), $db);

                      echo "<p>Vous êtes inscrit</p>";
                    }
                    else{
                      echo "<p>Les mots de passe ne correspondent pas</p>";
                    }
                  }
                  else{
                    echo "<p>Les adresses mail ne correspondent pas</p>";
                  }
                }else{
                  if (!preg_match($expression, $$_POST['verif_adresse_mail'])) {
                    echo "<p>Le format de l'email n'est pas correct!</p>";
                    }
                }
              }else{
                if (!preg_match($expression, $_POST['adresse_mail'])) {
                  echo "<p>Le format de l'email n'est pas correct!</p>";
                  }
              }
            }
            else{
              echo "<p>Veuillez remplir tous les champs</p>";
            }
          }




          // if (isset($_POST['submitInscription'])) {
          //   $adresse_mail = $_POST['adresse_mail'];
          //   $verif_adresse_mail = $_POST['verif_adresse_mail'];
          //   $password = $_POST['password'];
          //   $verif_password = $_POST['verif_password'];

          //   if ($adresse_mail == $verif_adresse_mail && $password == $verif_password) {
          //     $utilisateur = new Utilisateur($adresse_mail, $password);
          //     $utilisateurGateway = new UtilisateurGateway();
          //     $utilisateurGateway->insert($utilisateur);
          //     echo '<p>Inscription réussie</p>';
          //   } else {
          //     echo '<p>Les deux adresses mail et les deux mots de passe ne correspondent pas</p>';
          //   }
          // }
        
      ?>


    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>