<?php
class Liste
{
  private $idListe;
  private $nomListe;
  private $idUser;
  private $listeTache;

    function __construct(string $nomListe)
    {
        // $this->idListe = $idListe;
        $this->nomListe = $nomListe;
        // $this->idUser = $idUser;
        // $this->listeTache = $listeTache;
    }

    public function ajouterTache(Tache $tache)
    {
        $this->listeTache[] = $tache;
    }

    public function getidListe()
    {
        return $this->idListe;
    }

    public function getnomListe()
    {
        return $this->nomListe;
    }

    public function getidUser()
    {
        return $this->idUser;
    }

    public function getlisteTache()
    {
        return $this->listeTache;
    }

    public function setidListe($idListe)
    {
        $this->idListe = $idListe;
    }

    public function setnomListe($nomListe)
    {
        $this->nomListe = $nomListe;
    }

    public function setidUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setlisteTache($listeTache)
    {
        $this->listeTache = $listeTache;
    }
}
?>