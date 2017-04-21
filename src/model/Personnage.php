<?php

namespace Src\Model;

require_once "../../Autoloader.php";
\Autoloader::register();

use Src\Model\Sort;
use Src\Model\Objet;
use Src\Model\Rules;

class Personnage implements \JsonSerializable
{
    private $nom,
            $titre,
            $statPhysique,
            $statMental,
            $statSocial,
            $statMagie,
            $divers,
            $hp,
            $mana,
            $armor;

    /**
    * @var array
    */
    private $competences;
    
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
        $statPhysique = (int) $statPhysique;
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
        $statMental = (int) $statMental;
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
        $statSocial = (int) $statSocial;
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
        $statMagie = (int) $statMagie;
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
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * @param array $competence
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;
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

    public function getHp(){
        return $this->hp;
    }

    public function setHp($hp){
        $this->hp = $hp;
    }

    public function getArmor(){
        return $this->armor;
    }

    public function setArmor($armor){
        $this->armor = $armor;
    }

    public function getMana(){
        return $this->mana;
    }

    public function setMana($mana){
        $this->mana = $mana;
    }

    public function jsonSerialize()
    {
        return array(
            "nom" => $this->nom,
            "titre" => $this->titre,
            "statPhysique" => $this->statPhysique,
            "statMental" => $this->statMental,
            "statSocial" => $this->statSocial,
            "statMagie" => $this->statMagie,
            "divers" => $this->divers,
            "competences" =>$this->competences,
            "sorts" => $this->sorts,
            "equipement" => $this->equipement,
            "hp" => $this->hp,
            "mana" => $this->mana,
            "armor" => $this->armor
        );
    }

}