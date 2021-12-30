<?php
    class indexGateway{
        function __construct(){
        }
        public function initalisationConnexion(){
            //require (__DIR__.'../../config/Connection.php');
            //require_once(__DIR__.'/../config/Autoload.php');
            //Autoload::charger();

            try{
                global $db;
                $username = 'root';
                $password = '';
                $dsn = 'localhost';
                $dbname = 'todoux';
                $db = new Connection($dsn, $dbname, $username, $password);
            }catch(PDOException $e){ 
                echo "connection refusé";
            } 
        }
    }
?>