<?php
class Tache{
	private $idTache;
	private $idList;
	private $titre;
	private $description;

	function __construct (int $idTache, int $idList, string $titre, string $description){
		$this->idTache = $idTache;
		$this->idList = $idList;
		$this->titre = $titre;
		$this->description = $description;
	}
	public function getidList(){
		return $this->idList;
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