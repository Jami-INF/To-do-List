<?php
    class indexGateway{
        function __construct(){
        }
        public function initalisationConnexion(){
            require (__DIR__.'../../config/Connection.php');
            //require_once(__DIR__.'/../config/Autoload.php');
            //Autoload::charger();

            try{
                // $username = 'root';
                // $password = '';
                // $dsn = 'localhost';
                // $conname = 'todoux';
                global $username, $password, $dsn, $dbname;
                $con = new Connection($dsn, $dbname, $username, $password);
                return $con;
            }catch(PDOException $e){ 
                echo "connection refusé";
            } 
        }
    }
?>