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
    
        echo 1;
        //$query = "INSERT INTO list VALUES (:nomList)";
        $query = ("INSERT INTO `list`(`nomList`) VALUES (:nomList)");
        echo 2;
        $this->con->executeQuery($query, array(
            ':nomList' => array($nomList, PDO::PARAM_STR)));
        echo ('inssertion réussi');
    }

}
?>