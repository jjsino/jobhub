<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\PaysRepository")
 */
class Pays
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
     * @ORM\Column(name="code_tel", type="integer")
     */
    private $codeTel;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviation", type="string", length=10)
     */
    private $abreviation;

    /**
     * @ORM\OneToMany(targetEntity="Region", mappedBy="pays", cascade={"remove","persist"})
     */
    private $regions;
    
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
     * Set codeTel
     *
     * @param integer $codeTel
     * @return Pays
     */
    public function setCodeTel($codeTel)
    {
        $this->codeTel = $codeTel;
    
        return $this;
    }

    /**
     * Get codeTel
     *
     * @return integer 
     */
    public function getCodeTel()
    {
        return $this->codeTel;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Pays
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

    /**
     * Set abreviation
     *
     * @param string $abreviation
     * @return Pays
     */
    public function setAbreviation($abreviation)
    {
        $this->abreviation = $abreviation;
    
        return $this;
    }

    /**
     * Get abreviation
     *
     * @return string 
     */
    public function getAbreviation()
    {
        return $this->abreviation;
    }
    
    /**
     * Get regions
     *
     * @return array 
     */
    public function getRegions()
    {
        return $this->regions;
    }
}
