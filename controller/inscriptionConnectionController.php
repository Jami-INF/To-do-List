<?php

    require (__DIR__.'../../modeles/Utilisateur.php');
    require (__DIR__.'../../modeles/UtilisateurGateway.php');

    class inscriptionConnectionController{
        public function __construct(){
            
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
                      $utilisateurGateway = new UtilisateurGateway();
                      $utilisateurGateway->addUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
                      header('Location: accueil.php');
                      

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

        }
        public function connection(){
            filter_var($_POST['adresse_mail'], FILTER_SANITIZE_EMAIL);
            filter_var($_POST['password'], FILTER_SANITIZE_STRING, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]{6,}$/")));
            $expression = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

            if(isset($_POST['submitConnection'])){
                if(!empty($_POST['adresse_mail'])){
                  if(!empty($_POST['password'])){
                    
                        $pswd = md5($_POST['password']);
                        $utilisateur = new Utilisateur($_POST['adresse_mail'],$pswd);
                        $utilisateurGateway = new UtilisateurGateway();
                        $utilisateurGateway->addUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
                        echo "<p>Vous êtes connecté</p>";
                  }
                }else{
                  if (!preg_match($expression, $_POST['adresse_mail'])) {
                    echo "<p>Le format de l'email n'est pas correct!</p>";
                   }
                }
            }


             if(isset($_POST['submitConnexion'])){
                 $utilisateur = new Utilisateur($_POST['adresse_mail'],$_POST['password']);
                 $utilisateurGateway = new UtilisateurGateway();
                 $utilisateurRep = $utilisateurGateway->findUser($utilisateur->getEmail(),$utilisateur->getMotDePasse());
                 echo $utilisateurRep;
                 if($utilisateurRep!=NULL){
                 echo "bon utilisateur";
                 header('Location: accueil.php');
                 }else{
                 echo "mauvais utilisateur";
                 }
             }
        
        }
    }
?>