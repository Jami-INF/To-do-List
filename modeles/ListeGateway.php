<?php


class ListeGateway{
public $con;
    public function __construct()
    {
        
        global $con, $username, $password, $dsn, $dbname;
        try{
            $this->con = new Connection($dsn, $dbname, $username, $password);
        }catch(PDOException $e){ 
            echo "connection refusé";
        } 
    }

    public function addList($nomList){
        //$query = "INSERT INTO list VALUES (:nomList)";
        if(isset($_POST['listeInviteCheck'])){
            $idUser=0;
        }else{
            $idUser=$_SESSION['idUser'];
        }
        $query = ("INSERT INTO `list`(`nomList`, `idUser`) VALUES (:nomList,:idUser)");
        $this->con->executeQuery($query, array(
            ':nomList' => array($nomList, PDO::PARAM_STR),
            ':idUser' => array ($idUser,PDO::PARAM_STR)
        ));
        echo ('inssertion réussi');
    }

    public function getList(){
        $idUser=$_SESSION['idUser'];

        $query = "SELECT * FROM list WHERE idUser = :idUser";//$_SESSION['idList']
        $this->con->executeQuery($query, array(
            ':idUser' => array ($idUser,PDO::PARAM_STR),
        ));
        $resultat = $this->con->getResults(); 
        return $resultat;
        echo "jesuispasse";
    }

    public function getListInvite(){
        $idUser=0;

        $query = "SELECT nomList FROM list WHERE idUser = :idUser";//$_SESSION['idList']
        $this->con->executeQuery($query, array(
            ':idUser' => array ($idUser,PDO::PARAM_STR),
        ));
        $resultat = $this->con->getResults(); 
        return $resultat;
        echo "jesuispasse";
    }

    public function ajouterTacheDansListe(){
        // $idListe = $_GET['list'];
      $query = "SELECT * FROM `todoux` WHERE `idList`=".$_GET['list'];
      $param =[];
      $this->con->executeQuery($query, $param);
      $result=$this->con->getResults();
        echo "<div class='flexbox'>";
        
        foreach ($result as $row) {
      
        echo '<div class="flexboxitem">';
        echo "<h3>".$row['nomTache']."</h3>";
        echo "<p>".$row['descriptionTache']."</p>";
        echo '<div class="itemlist">';
        echo '<form class="fromliste"><input type="checkbox" name="checkbox" value="checkbox"></form>';
        echo "<button><i class='bx bx-trash'></i></button>";
        echo "</div>";
        echo "</div>";

        if (isset($_POST['supp'])) {
          $tache = new TacheGateway($this->con);
          $tache->SupprimerTache($row['nomTache'], $row['descriptionTache'], $row['idList']);
        }
      }
      echo "<a class='butonacueil' href='?action=NewTachePage&amp;list=".$_GET['list']."'>
      <button type='button' name='button' class='btn btn-primary' id='btn'>Ajouter une tache</button>
        </a>";
    }



}
?>