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
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2)
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3)
     */
    private $alpha3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_en", type="string", length=45)
     */
    private $nomEn;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_fr", type="string", length=45)
     */
    private $nomFr;

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
     * Set code
     *
     * @param integer $code
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Pays
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;
    
        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Pays
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;
    
        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set nomEn
     *
     * @param string $nomEn
     * @return Pays
     */
    public function setNomEn($nomEn)
    {
        $this->nomEn = $nomEn;
    
        return $this;
    }

    /**
     * Get nomEn
     *
     * @return string 
     */
    public function getNomEn()
    {
        return $this->nomEn;
    }

    /**
     * Set nomFr
     *
     * @param string $nomFr
     * @return Pays
     */

    public function setNomFr($nomFr)
    {
        $this->nomFr = $nomFr;
    
        return $this;
    }

    /**
     * Get nomFr
     *
     * @return string 
     */
    public function getNomFr()
    {
        return $this->nomFr;
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
    
    public function __toString()
    {
    	return $this->nomFr;
    }
}
