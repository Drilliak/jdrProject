<?php

namespace Src\Model;


class Sort
{
    private $nom;
    private $description;
    
    public function __construct($nom, $description)
    {
        $this->nom = $nom;
        $this->description = $description;        
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
}