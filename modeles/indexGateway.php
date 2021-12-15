<?php
    class indexGateway{
        function __construct(){
            
        }
        public function connection(){
            require (__DIR__.'/config/Connection.php');

            try{
            $username = 'root';
            $password = '';
            $dsn = 'localhost';
            $dbname = 'todoux';
            $db = new Connection($dsn, $dbname, $username, $password);
            global $db;
            }catch(PDOException $e){ 
            echo "connection refusé";
            
            } 
        }

    }



?>