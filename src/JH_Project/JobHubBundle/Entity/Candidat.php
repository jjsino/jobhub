<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection as DAC;

/**
 * Candidat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\CandidatRepository")
 *
 * @IgnoreAnnotation("Assert")
 */
class Candidat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

	/**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1, nullable=true)
     *
     * values: F, M
     */
    private $sex;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

   /**
     * @ORM\OneToOne(targetEntity="Ville", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */ 
    private $ville;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="site_perso", type="string", length=255, nullable=true)
     */
    private $sitePerso;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_etudes", type="string", length=255, nullable=true)
     */
    private $niveauEtudes;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=true)
     */
    private $codePostal;
    
   /** 
    * @ORM\OneToMany(targetEntity="Formation", mappedBy="candidat", cascade={"remove","persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $formations;

   /** 
    * @ORM\OneToMany(targetEntity="Experience", mappedBy="candidat", cascade={"remove","persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $experiences;
    
   /** 
    * @ORM\OneToMany(targetEntity="CV", mappedBy="candidat", cascade={"remove","persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $resumes;

   /** 
    * @ORM\OneToMany(targetEntity="Candidature", mappedBy="candidat", cascade={"remove","persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $candidatures;
    
   /**
    * @ORM\ManyToMany(targetEntity="Offre", cascade={"persist"})
    */
    private $offres_sauvegardes;
    
   /*
    * @var boolean
    *
    * @ORM\Column(name="profil_visibility", type="boolean", nullable=false)
    */ 
    private $profil_visibility;
    
   /**
     *  @Assert\Image
     */ 
    public $photoProfil;

   /**
     * @ORM\OneToOne(targetEntity="Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, unique=true)
     */ 
    private $compteUser;     

    /**
     * @var string
     *
     * @ORM\Column(name="path_photo_profil", type="string", length=255, nullable=true)
     */
    private $pathPhotoProfil;
	
	/*
	* @var string
	*/
	public $save_name;
	
	public function __construct()
	{		
		$this->profil_visibility = false;
		$this->offres_sauvegardes = new DAC();
	}
	
   /**
    * add offres_sauvegardes
    *
    * @param Offre $offre_sauvegarde
    */
    public function addOffreSauvegarde(Offre $offre_sauvegarde)
    {
    	$this->offres_sauvegardes[] = $offre_sauvegarde;
    }
    
   /**
    * remove offre_sauvegarde
    *
    * @param Offre $tag
    */
    public function removeOffreSauvegarde(Offre $offre_sauvegarde)
    {
    	$this->offres_sauvegardes->removeElement($offre_sauvegarde);
    }
    
   /**
    * get offres_sauvegardes
    *
    * @return array
    */
    public function getOffresSauvegardes()
    {
    	return $this->offres_sauvegardes;
    }      
    public function check_info_base()
     {
		 if ($this->birthday && $this->nom && $this->adresse && $this->prenom && $this->ville && $this->codePostal){
		 	return true;
		 }
     	 else return false;
     }

    /**
     * Set profil_visibility
     *
     * @param boolean $profil_visibility
     * @return Candidat
     */
    public function setProfilVisibility($profil_visibility)
    {
        $this->profil_visibility = $profil_visibility;
    
        return $this;
    }

    /**
     * Get profil_visibility
     *
     * @return boolean 
     */
    public function getProfilVisibility()
    {
        return $this->profil_visibility;
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
     * Set nom
     *
     * @param string $nom
     * @return Candidat
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
     * Set prenom
     *
     * @param string $prenom
     * @return Candidat
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    
    /**
     * Set sex
     *
     * @param string $sex
     * @return Candidat
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Offre
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    
    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Candidat
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param Ville $ville
     * @return Candidat
     */
    public function setVille(Ville $ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }
    
    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Candidat
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set sitePerso
     *
     * @param string $sitePerso
     * @return Candidat
     */
    public function setSitePerso($sitePerso)
    {
        $this->sitePerso = $sitePerso;
    
        return $this;
    }

    /**
     * Get sitePerso
     *
     * @return string 
     */
    public function getSitePerso()
    {
        return $this->sitePerso;
    }

    /**
     * Set niveauEtudes
     *
     * @param string $niveauEtudes
     * @return Candidat
     */
    public function setNiveauEtudes($niveauEtudes)
    {
        $this->niveauEtudes = $niveauEtudes;
    
        return $this;
    }

    /**
     * Get niveauEtudes
     *
     * @return string 
     */
    public function getNiveauEtudes()
    {
        return $this->niveauEtudes;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Candidat
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
     * Get formations
     *
     * @return array
     */
     public function getFormations() 
     {
		return $this->formations;
     }

    /**
     * Get experiences
     *
     * @return array
     */
     public function getExperiences() 
     {
		return $this->experiences;
     }
     
    /**
     * Get resumes
     *
     * @return array
     */
     public function getResumes() 
     {
		return $this->resumes;
     }

    /**
     * Get candidatures
     *
     * @return array
     */
     public function getCandidatures() 
     {
		return $this->candidatures;
     }

    /**
     * Set pathPhotoProfil
     *
     * @param string $pathPhotoProfil
     * @return Candidat
     */
    public function setPathPhotoProfil(string $pathPhotoProfil)
    {
        $this->pathPhotoProfil = $pathPhotoProfil;
    
        return $this;
    }

    /**
     * Set compteUser
     *
     * @param Utilisateur $compteUser
     * @return Candidat
     */
    public function setCompteUser(Utilisateur $compteUser)
    {
        $this->compteUser = $compteUser;
    
        return $this;
    }
        
    /**
     * Get compteUser
     *
     * @return Utilisateur 
     */
    public function getCompteUser()
    {
        return $this->compteUser;
    }	
    
    public function getAbsolutePath()
    {
        return $this->getUploadRootDir().'/'.$this->pathPhotoProfil;
    }
	
	//asset path for twig
    public function getPathPhotoProfil()
    {
        return 'bundles/jobhub/'.$this->getUploadDir().'/'.$this->pathPhotoProfil;
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->pathPhotoProfil;
    }

    protected function getUploadRootDir()
    {
        return __DIR__."/../../../../web/bundles/jobhub/".$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'user_uploads/Profil_Candidat';
    }
        
    public function uploadPhotoProfil()
	{
		if (null === $this->photoProfil) {
		    return;
		}
		$extension = $this->photoProfil->guessExtension();
		if (!$extension) {
			$extension = 'jpg';
		}
		$this->save_name = 'Profil_Candidat_'.$this->id.'.'.$extension;
		$this->photoProfil->move($this->getUploadRootDir(), $this->save_name);
		$this->pathPhotoProfil = $this->save_name;
		$this->save_name = null;
		$this->photoProfil = null;
	}
	
	/**
     * @ORM\PostRemove()
     */
    public function removePhotoProfil()
    {	
        if ($this->pathPhotoProfil) {
            unlink($this->getAbsolutePath());
        }
    }	
}
