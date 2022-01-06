<?php


class ListeGateway{
public $con;
    public function __construct()
    {
        global $username, $password, $dsn, $dbname;
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
        function check($idTache){
            $query = "UPDATE `todoux` SET `estCochee`= 1 WHERE idTache = :idTache";
            $this->con->executeQuery($query, array(
                ':idTache' => array ($idTache,PDO::PARAM_INT),
            ));
        }
        function uncheck($idTache){
            $query = "UPDATE `todoux` SET `estCochee`= 0 WHERE idTache = :idTache";
            $this->con->executeQuery($query, array(
                ':idTache' => array ($idTache,PDO::PARAM_INT),
            ));
        }


        // $idListe = $_GET['list'];
      $query = "SELECT * FROM `todoux` WHERE `idList`=".$_GET['list'];
      $param =[];
      $this->con->executeQuery($query, $param);
      $result=$this->con->getResults();
        echo "<div class='flexbox'>";
        
        foreach ($result as $row) {
            $idTache = $row['idTache'];
                
            echo '<div class="flexboxitem">';
            echo "<h3>".$row['nomTache']."</h3>";
            echo "<p>".$row['descriptionTache']."</p>";
            echo '<div class="itemlist">';
            if($row['estCochee']=="1"){
                echo "<form class='fromliste'><input type='hidden' value='".$row['idTache']."'><input type='checkbox' name='checkbox' checked='checked' value='checkbox'></form>";
            }else{
                echo '<form class="fromliste"><input type="checkbox" name="checkbox" value="checkbox"></form>';
            }

            echo "<a href='?action=supprimerTache&amp;idTache=".$row['idTache']."&amp;list=".$_GET['list']."'><button><i class='bx bx-trash'></i></button></a>";
            
            echo "</div>";
            echo "</div>";

      }
      echo "<a class='butonacueil' href='?action=NewTachePage&amp;list=".$_GET['list']."'>
      <button type='button' name='button' class='btn btn-primary' id='btn'>Ajouter une tache</button>
        </a>";
    }



}
?>