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
        //echo date('d M y');
        //echo date('d M y', strtotime("28/11/2021"));
        require (__DIR__.'/modeles/Tache.php');
        $t1 = new Tache(12,'nomTache', 'descriptionTache');
        $t2 = new Tache(12,'nomTachefgqfgqfdgqdfgqdf', 'descriptionTache2');
        $t3 = new Tache(3, 12,'nomTache', 'descriptionTache3');
        $TTaches = array($t1, $t2, $t3);

        //$idTache = $t1->getidtache();
        $idList = $t1->getidlist();
        $nomTache = $t1->getnomTache();
        $descriptionTachess = $t1->getdescriptionTache();
        //$test = $db->prepare ("SELECT * FROM Todoux");
        //$test->execute();
        
        $query = "INSERT INTO Todoux VALUES(:nomTache, :descriptionTachess, :idList)";

        $db->executeQuery($query,array(
          ':nomTache' => array($nomTache, PDO::PARAM_STR),
          ':descriptionTachess' => array($descriptionTachess, PDO::PARAM_STR),
          ':idList' => array($idList, PDO::PARAM_INT),
        ));
        
        foreach ($TTaches as $tache){
          echo "<br>";
          echo $tache->getnomTache();
          echo "zebi";
          echo "<br>";
        }
        
      ?>
      <a class="butonacueil" href="newTache.php">
        <button type="button" name="button" class="btn btn-primary" id="btn">Ajouter une tache</button>
      </a>
      <?php
      require_once(__DIR__.'/modeles/TacheGateway.php');
      $query = "SELECT * FROM Todoux";
      $param =[];
      $db->executeQuery($query, $param);
      $result=$db->getResults();
      foreach ($result as $row) { 
        echo "<br>";
        echo $row['nomTache'];
        echo "<br>";
        echo $row['descriptionTache'];
        echo "<br>";
        echo $row['idList'];
        echo "<br>";

        if (isset($_POST['supp'])) {
          $tache = new TacheGateway ($db);
          $tache->SupprimerTache($row['nomTache'], $row['descriptionTache'], $row['idList'], $db);
        }
        ?>
        <form method="post">
          <a class="butonacueil">
          <button type="submit" name="supp" id="add_btn" class="add_btn">Supprimer TOUTE les tache</button>
        </form>
      </a>
      <?php
      }
      ?>
      
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>
