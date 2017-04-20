<?php

namespace Src\Model;


class Objet
{
    private $nom;
    private $description;
    private $cout;
    public function __construct($nom, $description, $cout)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->cout = $cout;     
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param mixed $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }
}