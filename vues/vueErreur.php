<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> ToDoux Liste </title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../sidebar.css">
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
        <a href="/../index.php">
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
        if(isset($dataVueErreur))
        {
            foreach($dataVueErreur as $value)
            {
                echo $value;
            }
        }

    ?>
    </div>     

  </section>
  <script src="../script.js"></script>
</body>
</html>

