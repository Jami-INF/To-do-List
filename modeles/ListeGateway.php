<?php


class ListeGateway{
private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function addList($nomList){
    
        echo 1;
        $query = "INSERT INTO list VALUES (:nomList)";
        echo 2;
        $this->connexion->executeQuery($query, array(
            ':nomList' => array($nomList, PDO::PARAM_STR)));
        echo ('inssertion réussi');
    }

    public function getList(){
        $query = "SELECT * FROM list";
        $result = $this->connexion->executeQuery($query);
        return $result;
    }

}

// class ListeGateway{
//     private $con; 

//         public function __construct(Connection $con) { 
//             $this->con = $con;  
//         }

//         function rowCount(){
//           $count = $con->query('SELECT count(*) as nb FROM Todoux');
//           $data = $count->fetch();
//           $idTache = ($data['nb'] +1);
//           //$count->execute();
//           //$idTache = $count->fetchAll();
//           echo $idTache;
//           $query = "INSERT INTO Todoux VALUES(:nomTache, :descriptionTache, :idTache, :idUser)";
//         }

//         function creerListeBDD($nomListe){
//             $querry = "INSERT INTO list VALUES (':nomListe')";
//             $con->executeQuery($querry,array(
//                 ':nomListe' => array($nomListe, PDO::PARAM_STR),
//             ));

//         }
// }

?>