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
         <span class="tooltip">Search</span>
      </li>
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
    <a href="index.php">
        <h1>ToDoux Liste</h1>
      </a>
    <h2>Nouvelle liste</h2>
  
    <form action="newList.php" method="POST">
        <input type="text" name="nomListe" placeholder="Nom de la liste">
        <input type="submit" name="submitListe" value="Ajouter">
    </form>
    <!-- <form action="index.php" method="POST" autocomplete="off">
        <input type="text" name="liste" placeholder="Donner un nomTache à la liste">
        <input type="submit" value="Ajouter la liste">
</form> -->




    
    <?php
    require_once(__DIR__.'/config/Connection.php');
    require_once(__DIR__.'/modeles/ListeGateway.php');

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
    filter_var($_POST['nomListe'], FILTER_SANITIZE_STRING);
    
    if(isset($_POST['submitListe'])){
      if(isset($_POST['nomListe'])){
          $nomListe = $_POST['nomListe'];
          $liste = new ListeGateway($db);
          $liste->addList($nomListe);
          $liste->getList();
      }else{
          echo "Veuillez remplir le nom de la liste";
      }
    }

    
      // echo 1;
      // $nomListe=$_POST['nomListe'];
      // $query = "INSERT INTO list VALUES (:nomList)";
      // echo 4;
      // $db->executeQuery($query, array(
      //     ':nomList' => array($nomListe, PDO::PARAM_STR)));
      // echo ('inssertion réussi');
      // echo 3;
      
      // $query = "SELECT * FROM list";
      // $result = $db->executeQuery($query);
      // // echo 5;
      // echo $result;






    ?>
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>
