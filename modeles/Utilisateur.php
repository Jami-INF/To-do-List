<?php
class Utilisateur{
    private $email;
    private $motDePasse;

    function __construct(string $email, string $motDePasse)
    {
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getMotDePasse()
    {
        return $this->motDePasse;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }
}


?>