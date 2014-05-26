<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\VilleRepository")
 */
class Ville
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
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="villes", cascade={"remove"})
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     */
    private $region;
    
    /**
     * @ORM\OneToMany(targetEntity="Entreprise", mappedBy="ville", cascade={"remove","persist"})
     */
    private $entreprises;

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
     * Set region
     *
     * @param Region $region
     * @return Ville
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    
        return $this;
    }
    
    /**
     * Get $region
     *
     * @return Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Ville
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    
        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Ville
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    public function __toString()
    {
        return $this->nom;
    }
    /**
     * Get entreprises
     *
     * @return array 
     */
    public function getEntreprises()
    {
        return $this->entreprises;
    }
    
    
}
