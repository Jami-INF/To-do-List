<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ToDoux Liste </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">
      <p class="logo_name">ToDoux Liste</p>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
         <i class='bx bx-search' ></i>
         <input type="text" placeholder="Recherche...">
         <span class="tooltip">Rechercher</span>
      </li>
      <li>
        <a href="?action=Deconnexion">
         <i class='bx bx-log-out' ></i>
         <p class="links_name">Déconecter</p>
        </a>
         <p class="tooltip">Déconecter</p>
      </li>
      <li>
        <a href="?action=Accueil">
         <i class='bx bx-home-alt' ></i>
         <p class="links_name">Accueil</p>
        </a>
         <p class="tooltip">Accueil</p>
      </li>
      <li>
       <a href="#">
         <i class='bx bx-user' ></i>
         <p class="links_name">Compte utilisateur</p>
       </a>
       <p class="tooltip">Compte utilisateur</p>
     </li>
     <li>
       <a href="#">
        <i class='bx bxs-graduation' ></i>
        <p class="links_name">Espace de travail</p>
       </a>
       <p class="tooltip">Espace de travail</p>
     </li>
     <?php
      $sidebar = new sidebarController();
      $sidebar->afficherListesPrivees();
      $sidebar->afficherListesPubliques();
      ?>
     <li>
       <a href="?action=NewListePage">
        <i class='bx bx-plus' ></i>
        <p class="links_name">Ajouter liste</p>
       </a>
       <p class="tooltip">Ajouter liste</p>
     </li>
     <li>
       <a href="#">
        <i class='bx bx-cog' ></i>
        <p class="links_name">Setting</p>
       </a>
       <p class="tooltip">Setting</p>
     </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="main">
    <a href="index.php">
        <h1>ToDoux Liste</h1>
      </a>
    <h2>Nouvelle tache</h2>
    <div class="formulaire">
      <?php
      echo "<form method='post' action='index.php?action=creerTache&amp;list=".$_GET['list']."''>
      <input type='text' name='nomTache' placeholder='Nom de la tache'>
      <input type='text' name='descriptionTache' placeholder='descriptionTache'>
      <button type='submit' name='submitNewTache' id='add_btn' class='add_btn'>Add Task</button>
      </form>";
      //      input type='submit' name='submitNewTache' value='Ajouter'>

      ?>

    </div>
    <?php
    

    // if (isset($_POST['submit'])) {
    //   if(!empty($_POST['nomTache'])){
    //     if(!empty($_POST['descriptionTache'])){
    //       if(!empty($_POST['idUser'])){
    //         $tache = new TacheGateway($con);
    //         $tache->AjoutTacheManuellement ($_POST['nomTache'], $_POST['descriptionTache'], $_POST['idUser']);
    //       }else{
    //         echo "veuillez remplir le champ idUser";
    //       }
    //     }else{
    //       echo "veuillez remplir le champ descriptionTache";  
    //     }
    //   }else{
    //     echo "veuillez remplir le champ nomTache";
    //   }
    // }
  ?>
	                
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>
