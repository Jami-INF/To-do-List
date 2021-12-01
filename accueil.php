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
        <a href="index.php">
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
     <li>
       <a href="#">
        <i class='bx bx-list-ul'></i>
        <p class="links_name">List 1</p>
       </a>
       <p class="tooltip">List 1</p>
     </li>
     <li>
      <a href="#">
        <i class='bx bx-list-ul'></i>
        <p class="links_name">List 2</p>
      </a>
      <p class="tooltip">List 2</p>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-list-ul'></i>
        <p class="links_name">List 3</p>
      </a>
      <p class="tooltip">List 3</p>
    </li>
     <li>
       <a href="newList.php">
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
	<?php
        require (__DIR__.'/config/Connection.php');

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
        require (__DIR__.'/modeles/Tache.php');
        $t1 = new Tache(1, 12,'titre', 'description', '28/11/2021', '24/12/2021');
        $t2 = new Tache(2, 12,'titresfgqfgqfdgqdfgqdf', 'description2', '29/10/2021', '20/12/2021');
        $t3 = new Tache(3, 12,'titre', 'description3', '27/11/2021', '15/12/2021');
        $TTaches = array($t1, $t2, $t3);

        $idTache = $t1->getidtache();
        $idUser = $t1->getiduser();
        $titre = $t1->gettitre();
        $descriptionss = $t1->getdescription();
        $dateAjout = $t1->getdateajout();
        $dateExpiration = $t1->getdateexpiration();
        //$test = $db->prepare ("SELECT * FROM Todoux");
        //$test->execute();

        $query = "INSERT INTO Todoux VALUES(:titre, :descriptionss, :idTache, :idUser, :dateAjout, :dateExpiration)";

        $db->executeQuery($query,array(
          ':titre' => array($titre, PDO::PARAM_STR),
          ':descriptionss' => array($descriptionss, PDO::PARAM_STR),
          ':idTache' => array($idTache, PDO::PARAM_INT),
          ':idUser' => array($idUser, PDO::PARAM_INT),
          ':dateAjout' => array($dateAjout, PDO::PARAM_STR),
          ':dateExpiration' => array($dateExpiration, PDO::PARAM_STR)
        ));
        foreach ($TTaches as $tache){
          echo "<br>";
          echo $tache->gettitre();
          echo "zebi";
          echo "<br>";
        }

      ?>

    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>
