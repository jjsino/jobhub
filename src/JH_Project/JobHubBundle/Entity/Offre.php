<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as DAC;
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
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="offres", cascade={"remove"})
     * @ORM\JoinColumn(name="ville_id", referencedColumnName="id", nullable=true)
     */
    private $ville;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

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
     * @var integer
     *
     * @ORM\Column(name="type_contrat", type="integer", nullable=true)
     *
     * 1: CDI; 2: CDD; 3: Stage; 4:Apprentissage; 5:Temps Partiel; 6: Freelance
     */
    private $typeContrat;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaire", type="integer", nullable =true)
     *
     * 1: SMIC; 2: 1500-2000; 3:2000-2500; 4:2500-3000; 5:3000-3500; 6:>3500
     */    
    private $salaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Activite", inversedBy="offres", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true,name="activite_id", referencedColumnName="id")
     */
    private $activite;
    
    /**
     * @ORM\ManyToOne(targetEntity="Domaine", inversedBy="offres", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true,name="domaine_id", referencedColumnName="id")
     */
    private $domaine;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     * @ORM\JoinTable(name="offre_tag")
     */
    public $tags;
    
    public function __construct()
    {
    	$this->maj = new \DateTime('NOW');
    	$this->enabled = false;
    	$this->tags = new DAC();
    }
    
   /**
    * add tag
    *
    * @param Tag $tag
    */
    public function addTag(Tag $tag)
    {
    	$this->tags[] = $tag;
    }
    
   /**
    * remove tag
    *
    * @param Tag $tag
    */
    public function removeTag(Tag $tag)
    {
    	$this->tags->removeElement($tag);
    }

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
     * Set enabled
     *
     * @param boolean $enabled
     * @return Offre
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
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
    
    /**
     * Set activite
     *
     * @param Activite $activite
     * @return Offre
     */
    public function setActivite(Activite $activite)
    {
        $this->activite = $activite;
    
        return $this;
    }
    
    /**
     * Get activite
     *
     * @return Activite 
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set domaine
     *
     * @param Domaine $domaine
     * @return Offre
     */
    public function setDomaine(Domaine $domaine)
    {
        $this->domaine = $domaine;
    
        return $this;
    }
    
    /**
     * Get domaine
     *
     * @return Domaine 
     */
    public function getDomaine()
    {
        return $this->domaine;
    }	
    /**
     * Get ville
     *
     * @return Ville
     */
	public function getVille() {
		return $this->ville;
	}
	/**
	 * Set ville
	 *
	 * @param Ville $ville
	 * @return Offre
	 */
	public function setVille($ville) {
		$this->ville = $ville;
		return $this;
	}
	
    /**
     * Get type_contrat
     *
     * @return string
     */
	public function getTypeContrat() {
		return $this->typeContrat;
	}
	/**
	 * Set typeContrat
	 *
	 * @param string $typeContrat
	 * @return Offre
	 */
	public function setTypeContrat($typeContrat) {
		$this->typeContrat = $typeContrat;
		return $this;
	}

    /**
     * Get salaire
     *
     * @return string
     */
	public function getSalaire() {
		return $this->salaire;
	}
	/**
	 * Set salaire
	 *
	 * @param string $salaire
	 * @return Offre
	 */
	public function setSalaire($salaire) {
		$this->salaire = $salaire;
		return $this;
	}
}


