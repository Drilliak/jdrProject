<?php

include 'Sort.php'
include 'Objet.php'
include 'Rules.php'
/**
* 
*/
class Personnage
{
    private $nom,
            $titre,
            $statPhysique,
            $statMental,
            $statSocial,
            $statMagie,
            $divers;

    /**
    * @var array
    */
    private $competence;
    
    /**
    * @var array
    */
    private $sorts;

    /**
    * @var array
    */
    private $equipement;

    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
              // On appelle le setter.
              $this->$method($value);
            }
        }
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getStatPhysique()
    {
        return $this->statPhysique;
    }

    /**
     * @param mixed $statPhysique
     */
    public function setStatPhysique($statPhysique)
    {
        $this->statPhysique = $statPhysique;
    }

    /**
     * @return mixed
     */
    public function getStatMental()
    {
        return $this->statMental;
    }

    /**
     * @param mixed $statMental
     */
    public function setStatMental($statMental)
    {
        $this->statMental = $statMental;
    }

    /**
     * @return mixed
     */
    public function getStatSocial()
    {
        return $this->statSocial;
    }

    /**
     * @param mixed $statSocial
     */
    public function setStatSocial($statSocial)
    {
        $this->statSocial = $statSocial;
    }

    /**
     * @return mixed
     */
    public function getStatMagie()
    {
        return $this->statMagie;
    }

    /**
     * @param mixed $statMagie
     */
    public function setStatMagie($statMagie)
    {
        $this->statMagie = $statMagie;
    }

    /**
     * @return mixed
     */
    public function getDivers()
    {
        return $this->divers;
    }

    /**
     * @param mixed $divers
     */
    public function setDivers($divers)
    {
        $this->divers = $divers;
    }

    /**
     * @return array
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * @param array $competence
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;
    }

    /**
     * @return array
     */
    public function getSorts()
    {
        return $this->sorts;
    }

    /**
     * @param array $sorts
     */
    public function setSorts($sorts)
    {
        $this->sorts = $sorts;
    }

    /**
     * @return array
     */
    public function getEquipement()
    {
        return $this->equipement;
    }

    /**
     * @param array $equipement
     */
    public function setEquipement($equipement)
    {
        $this->equipement = $equipement;
    }

}