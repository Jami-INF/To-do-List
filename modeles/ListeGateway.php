<?php


class ListeGateway{
public $con;
    require_once(__DIR__.'/../config/Connection.php');
    public function __construct()
    {
        try{
            global $con;
            $username = 'root';
            $password = '';
            $dsn = 'localhost';
            $conname = 'todoux';
            $con = new Connection($dsn, $conname, $username, $password);
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