<?php

    // require (__DIR__.'../../modeles/Utilisateur.php');
    // require (__DIR__.'../../modeles/UtilisateurGateway.php');
    // require_once(__DIR__.'/../config/Autoload.php');
    // Autoload::charger();

    class inscriptionConnectionController{
      private $con;
        public function __construct($con){
            $this->con = $con;
        }
        public function inscription(){
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
                    
                      $utilisateur = new Utilisateur($_POST['adresse_mail'],$_POST['password']);
                      $utilisateurGateway = new UtilisateurGateway($this->con);
                      $utilisateurGateway->addUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
                      require(__DIR__.'/../accueil.php');
                    
                      echo "<p>Vous êtes inscrit</p>";
                    }
                    else{
                      require(__DIR__.'/../inscription.php');
                      echo "<p>Les mots de passe ne correspondent pas</p>";
                    }
                  }
                  else{
                    require(__DIR__.'/../inscription.php');
                    echo "<p>Les adresses mail ne correspondent pas</p>";
                  }
                }else{
                  if (!preg_match($expression, $$_POST['verif_adresse_mail'])) {
                    require(__DIR__.'/../inscription.php');
                    echo "<p>Le format de l'email n'est pas correct!</p>";
                    }
                }
              }else{
                if (!preg_match($expression, $_POST['adresse_mail'])) {
                  require(__DIR__.'/../inscription.php');
                  echo "<p>Le format de l'email n'est pas correct!</p>";
                  }
              }
            }
            else{
              require(__DIR__.'/../inscription.php');
              echo "<p>Veuillez remplir tous les champs</p>";
            }
          }

        }
        public function connection(){
          echo "1";
          filter_var($_POST['adresse_mail'], FILTER_SANITIZE_EMAIL);
          filter_var($_POST['password'], FILTER_SANITIZE_STRING, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{6,}$/")));
          $expression = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
          echo "2";
          if(isset($_POST['submitConnexion'])){
            echo "3";
              if(!empty($_POST['adresse_mail'])){
                echo "4";
                if(!empty($_POST['password'])){
                  echo "5";
                  $utilisateur = new Utilisateur($_POST['adresse_mail'],$_POST['password']);
                  $utilisateurGateway = new UtilisateurGateway($this->con);
                  $utilisateurRep = $utilisateurGateway->findUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
                  echo $utilisateurRep;
                  if($utilisateurRep!=NULL){
                    echo "bon utilisateur";
                    require(__DIR__.'/../accueil.php');
                  }else{
                  echo "mauvais utilisateur";
                  require(__DIR__.'/../vueConnection.php');
                  }
                }
              }else{
                if (!preg_match($expression, $_POST['adresse_mail'])) {
                  echo "<p>Le format de l'email n'est pas correct!</p>";
                  require(__DIR__.'/../vueConnection.php');
                 }
                 echo "6";
              }
              echo "7";
          }
          echo "8";
      
      
            //  if(isset($_POST['submitConnexion'])){
            //      $utilisateur = new Utilisateur($_POST['adresse_mail'],$_POST['password']);
            //      $utilisateurGateway = new UtilisateurGateway($con);
            //      $utilisateurRep = $utilisateurGateway->findUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
            //      echo $utilisateurRep;
            //      if($utilisateurRep!=NULL){
            //      echo "bon utilisateur";
            //      header('Location: accueil.php');
            //      }else{
            //      echo "mauvais utilisateur";
            //      }
            //  }
        
        }
    }
?>