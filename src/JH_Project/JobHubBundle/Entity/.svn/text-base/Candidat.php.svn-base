<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\CandidatRepository")
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="site_perso", type="string", length=255)
     */
    private $sitePerso;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau_etudes", type="string", length=255)
     */
    private $niveauEtudes;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     */
    private $codePostal;
    
   /** 
    * @ORM\OneToMany(targetEntity="Formation", mappedBy="candidat", cascade={"remove","persist"})
    */
    private $formations;

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
     * Set email
     *
     * @param string $email
     * @return Candidat
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
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
	public function getFormations() {
		return $this->formations;
	}
	
}
