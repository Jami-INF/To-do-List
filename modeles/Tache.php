<?php
class Tache{
	private $idTache;
	private $idUser;
	private $titre;
	private $description;
	private $dateAjout;
	private $dateExpiration;

	function __construct (int $idTache, int $idUser, string $titre, string $description, string $dateAjout, string $dateExpiration){
		$this->idTache = $idTache;
		$this->idUser = $idUser;
		$this->titre = $titre;
		$this->description = $description;
		$this->dateAjout = $dateAjout;
		$this->dateExpiration = $dateExpiration;
	}
	public function getidUser(){
		return $this->idUser;
	}
	public function gettitre(){
		return $this->titre;
	}
	public function getidTache(){
		return $this->idTache;
	}
	public function getdescription(){
		return $this->description;
	}
	public function getdateAjout(){
		return $this->dateAjout;
	}
	public function getdateExpiration(){
		return $this->dateExpiration;
	}
	
}
?>