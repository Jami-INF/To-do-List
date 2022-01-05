<?php


class ListeGateway{
public $con;
    public function __construct()
    {
        
        global $con, $username, $password, $dsn, $dbname;
        try{
            if($con != null){

                $this->con = $con;
            }
            else{

                $this->con = new Connection($dsn, $dbname, $username, $password);
            }
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



}
?>