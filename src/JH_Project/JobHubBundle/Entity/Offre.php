<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\OffreRepository")
 */
class Offre
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="maj", type="datetime")
     */
    private $maj;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_poste", type="string", length=255)
     */
    private $fonctionPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entreprise", inversedBy="offres", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="entreprise_id", referencedColumnName="id")
     */
    private $entreprise;
    
    /**
     * @ORM\ManyToOne(targetEntity="Activite", inversedBy="offres", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="activite_id", referencedColumnName="id")
     */
    private $activite;

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
     * Set intitule
     *
     * @param string $intitule
     * @return Offre
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    
        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set maj
     *
     * @param \DateTime $maj
     * @return Offre
     */
    public function setMaj($maj)
    {
        $this->maj = $maj;
    
        return $this;
    }

    /**
     * Get maj
     *
     * @return \DateTime 
     */
    public function getMaj()
    {
        return $this->maj;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Offre
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set fonctionPoste
     *
     * @param string $fonctionPoste
     * @return Offre
     */
    public function setFonctionPoste($fonctionPoste)
    {
        $this->fonctionPoste = $fonctionPoste;
    
        return $this;
    }

    /**
     * Get fonctionPoste
     *
     * @return string 
     */
    public function getFonctionPoste()
    {
        return $this->fonctionPoste;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
        /**
     * Set entreprise
     *
     * @param Entreprise $entreprise
     * @return Offre
     */
    public function setEntreprise(Entreprise $entreprise)
    {
        $this->entreprise = $entreprise;
    
        return $this;
    }
    
    /**
     * Get entreprise
     *
     * @return Entreprise 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }
}
