<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\RegionRepository")
 */
class Region
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Pays", inversedBy="regions", cascade={"remove"})
     * @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     */
    private $pays;
    
    /**
     * @ORM\OneToMany(targetEntity="Ville", mappedBy="region", cascade={"remove","persist"})
     */
    private $villes;
       
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
     * Set pays
     *
     * @param Pays $pays
     * @return Region
     */
    public function setPays(Pays $pays)
    {
        $this->pays = $pays;
    
        return $this;
    }
    
    /**
     * Get $pays
     *
     * @return Pays 
     */
    public function getPays()
    {
        return $this->$pays;
    }
    
    /**
     * Set nom
     *
     * @param string $nom
     * @return Region
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
     * Get villes
     *
     * @return array 
     */
    public function getVilles()
    {
        return $this->villes;
    }
}
