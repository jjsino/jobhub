<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\ActiviteRepository")
 */
class Activite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="activite", cascade={"remove","persist"})
     */
    private $offres;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set domaine
     *
     * @param Domaine $domaine
     * @return Activite
     */
    public function setDomaine(Domaine $domaine)
    {
        $this->domaine = $domaine;
    
        return $this;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Activite
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
        
    /**
     * Get offres
     *
     * @return array 
     */
    public function getOffres()
    {
        return $this->offres;
    }
    
    public function __toString()
    {
    	return $this->libelle;
    }
}
