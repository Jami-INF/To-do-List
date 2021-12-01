<?php
class Tache{
	private $idList;
	private $nomTache;
	private $descriptionTache;

	function __construct (int $idList, string $nomTache, string $descriptionTache){
		$this->idList = $idList;
		$this->nomTache = $nomTache;
		$this->descriptionTache = $descriptionTache;
	}

	public function getidList(){
		return $this->idList;
	}
	public function getnomTache(){
		return $this->nomTache;
	}
	public function getdescriptionTache(){
		return $this->descriptionTache;
	}
	public function getdateAjout(){
		return $this->dateAjout;
	}
	
}
?>