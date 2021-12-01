<?php
class Tache{
	private $idTache;
	private $idUser;
	private $titre;
	private $description;

	function __construct (int $idTache, int $idUser, string $titre, string $description){
		$this->idTache = $idTache;
		$this->idUser = $idUser;
		$this->titre = $titre;
		$this->description = $description;
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
	
}
?>