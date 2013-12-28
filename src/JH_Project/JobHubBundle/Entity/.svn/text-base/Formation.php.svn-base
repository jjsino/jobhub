<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\FormationRepository")
 */
class Formation
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
     * @var \DateTime
     *
     * @ORM\Column(name="annee_debut", type="date")
     */
    private $anneeDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_fin", type="date")
     */
    private $anneeFin;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_diplome", type="string", length=255)
     */
    private $libelleDiplome;

    /**
     * @var string
     *
     * @ORM\Column(name="etablissement", type="string", length=255)
     */
    private $etablissement;

    /**
     * @var boolean
     *
     * @ORM\Column(name="diplome_obtenu", type="boolean")
     */
    private $diplomeObtenu;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Candidat", inversedBy="formations", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="candidat_id", referencedColumnName="id")
     */
    private $candidat;
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
     * Set anneeDebut
     *
     * @param \DateTime $anneeDebut
     * @return Formation
     */
    public function setAnneeDebut($anneeDebut)
    {
        $this->anneeDebut = $anneeDebut;
    
        return $this;
    }

    /**
     * Get anneeDebut
     *
     * @return \DateTime 
     */
    public function getAnneeDebut()
    {
        return $this->anneeDebut;
    }

    /**
     * Set anneeFin
     *
     * @param \DateTime $anneeFin
     * @return Formation
     */
    public function setAnneeFin($anneeFin)
    {
        $this->anneeFin = $anneeFin;
    
        return $this;
    }

    /**
     * Get anneeFin
     *
     * @return \DateTime 
     */
    public function getAnneeFin()
    {
        return $this->anneeFin;
    }

    /**
     * Set libelleDiplome
     *
     * @param string $libelleDiplome
     * @return Formation
     */
    public function setLibelleDiplome($libelleDiplome)
    {
        $this->libelleDiplome = $libelleDiplome;
    
        return $this;
    }

    /**
     * Get libelleDiplome
     *
     * @return string 
     */
    public function getLibelleDiplome()
    {
        return $this->libelleDiplome;
    }

    /**
     * Set etablissement
     *
     * @param string $etablissement
     * @return Formation
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;
    
        return $this;
    }

    /**
     * Get etablissement
     *
     * @return string 
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set diplomeObtenu
     *
     * @param boolean $diplomeObtenu
     * @return Formation
     */
    public function setDiplomeObtenu($diplomeObtenu)
    {
        $this->diplomeObtenu = $diplomeObtenu;
    
        return $this;
    }

    /**
     * Get diplomeObtenu
     *
     * @return boolean 
     */
    public function getDiplomeObtenu()
    {
        return $this->diplomeObtenu;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Formation
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
     * Get candidat
     *
     * @return Candidat
     */
	public function getCandidat() {
		return $this->candidat;
	}
	

	/**
	 * Set candidat
	 *
	 * @param Candidat $candidat
	 * @return Formation
	 */
	
	public function setCandidat($candidat) {
		$this->candidat = $candidat;
		return $this;
	}
	
    
}
