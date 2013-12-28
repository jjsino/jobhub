<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\EntrepriseRepository")
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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="raison_sociale", type="string", length=255)
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_email", type="string", length=255)
     */
    private $contactEmail;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true,name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(nullable=true, name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var integer
     *
     * @ORM\Column(nullable=true, name="fax", type="integer")
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="site_web", type="string", length=255)
     */
    private $siteWeb;

    /**
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="entreprise", cascade={"remove","persist"})
     */
    private $offres;
    
    /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $logo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="entreprises", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="ville_id", referencedColumnName="id")
     */
    private $ville;

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
     * Set logo
     *
     * @param Image $logo
     * @return Entreprise
     */
    public function setLogo(Image $logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return Image 
     */
    public function getLogo()
    {
        return $this->logo;
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
}
