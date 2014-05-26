<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\EntrepriseRepository")
 *
 * @IgnoreAnnotation("Assert")
 */ 
class Entreprise 
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
     * @ORM\Column(name="raison_sociale", type="string", length=255, nullable=true)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=255, nullable=true)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true,name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(nullable=true, name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var integer
     *
     * @ORM\Column(nullable=true, name="fax", type="integer", nullable=true)
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=255, nullable=true)
     */
    private $siteWeb;

    /**
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="entreprise", cascade={"remove","persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $offres;
        
   /**
     *  @Assert\Image
     */ 
    public $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="path_logo", type="string", length=255, nullable=true)
     */
    private $pathLogo;
	
	/*
	* @var string
	*/
	public $save_name;
	   
    /**
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="entreprises", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true,name="ville_id", referencedColumnName="id")
     */
    private $ville;
    
   /**
     * @ORM\OneToOne(targetEntity="Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, unique=true)
     */ 
    private $compteUser;
    
    public function check_info_base()
     {
		 if ($this->getNom() && $this->getAdresse() &&$this->getVille()){
		 	return true;
		 }
     	else return false;
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
     * @return Entreprise
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
     * Set raisonSociale
     *
     * @param string $raisonSociale
     * @return Entreprise
     */
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;
    
        return $this;
    }

    /**
     * Get raisonSociale
     *
     * @return string 
     */
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     * @return Entreprise
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    
        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string 
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Entreprise
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
     * Set telephone
     *
     * @param integer $telephone
     * @return Entreprise
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
     * Set fax
     *
     * @param integer $fax
     * @return Entreprise
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return integer 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Entreprise
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
     * Set siteWeb
     *
     * @param string $siteWeb
     * @return Entreprise
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;
    
        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string 
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
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
 
    /**
     * Set ville
     *
     * @param Ville $ville
     * @return Entreprise
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
     * Set compteUser
     *
     * @param Utilisateur $compteUser
     * @return Entreprise
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
        return $this->getUploadRootDir().'/'.$this->pathLogo;
    }
	
	//asset path for twig
    public function getpathLogo()
    {
        return 'bundles/jobhub/'.$this->getUploadDir().'/'.$this->pathLogo;
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->pathLogo;
    }

    protected function getUploadRootDir()
    {
        return __DIR__."/../../../../web/bundles/jobhub/".$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'user_uploads/Logo_Entreprise';
    }
        
    public function uploadLogo()
	{
		if (null === $this->logo) {
		    return;
		}
		$extension = $this->logo->guessExtension();
		if (!$extension) {
			$extension = 'jpg';
		}
		$this->save_name = 'Logo_Entreprise_'.$this->id.'.'.$extension;
		$this->logo->move($this->getUploadRootDir(), $this->save_name);
		$this->pathLogo = $this->save_name;
		$this->save_name = null;
		$this->logo = null;
	}
	
	/**
     * @ORM\PostRemove()
     */
    public function removeLogo()
    {	
        if ($this->pathLogo) {
            unlink($this->getAbsolutePath());
        }
    }	
    
}
