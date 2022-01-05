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
     if($_SESSION['idUser']!=0){
       echo '<p>Private</p>';
     }
      $listgw = new ListeGateway();
      $liste = $listgw->getList();
      foreach ($liste as $value) {
        echo "<li>
        <a href='?action=pageListe&amp;list=".$value['idList']."'>
         <i class='bx bx-list-ul'></i>
         <p class='links_name'>".$value['nomList']."</p>
        </a>
        <p class='tooltip'>".$value['nomList']."</p>
      </li>";
      }
      ?>
     <?php
     echo '<p>Public</p>';
      $listgw = new ListeGateway();
      $liste = $listgw->getListInvite();
      foreach ($liste as $value) {
        echo "<li>
        <a href='?action=pageListe'>
         <i class='bx bx-list-ul'></i>
         <p class='links_name'>".$value['nomList']."</p>
        </a>
        <p class='tooltip'>".$value['nomList']."</p>
      </li>";
      }
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
      <h1>To Do List</h1>
      
      
    </div>     

  </section>
  <script src="script.js"></script>
</body>
</html>