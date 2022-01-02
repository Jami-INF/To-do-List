<?php
    class indexGateway{
        function __construct(){
        }
        public function initalisationConnexion(){
            require (__DIR__.'../../config/Connection.php');
            //require_once(__DIR__.'/../config/Autoload.php');
            //Autoload::charger();

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
    }
?>