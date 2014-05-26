<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\CandidatureRepository")
 */
class Candidature
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

   /**
     * @ORM\ManyToOne(targetEntity="Candidat", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */ 
    private $candidat;
    
   /**
     * @ORM\ManyToOne(targetEntity="CV", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */ 
    private $cv;
        
   /**
     * @ORM\ManyToOne(targetEntity="Offre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */ 
    private $offre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="text")
     */
    private $motivation;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer")
     *
     * 1: indiférent; 0: ignoré; 2: sauvegardé;
     */
    private $etat;

    public function __construct()
    {
    	$this->date = new \DateTime('now');
    	$this->etat = 1;
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
     * Set date
     *
     * @param \DateTime $date
     * @return Candidature
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set candidat
     *
     * @param Candidat $candidat
     * @return Candidature
     */
    public function setCandidat(Candidat $candidat)
    {
        $this->candidat = $candidat;
    
        return $this;
    }

    /**
     * Get candidat
     *
     * @return Candidat 
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * Set cv
     *
     * @param CV $cv
     * @return Candidature
     */
    public function setCV(CV $cv)
    {
        $this->cv = $cv;
    
        return $this;
    }

    /**
     * Get cv
     *
     * @return CV 
     */
    public function getCV()
    {
        return $this->cv;
    }
    
     /**
     * Set offre
     *
     * @param Offre $offre
     * @return Candidature
     */
    public function setOffre(Offre $offre)
    {
        $this->offre = $offre;
    
        return $this;
    }

    /**
     * Get offre
     *
     * @return Offre 
     */
    public function getOffre()
    {
        return $this->offre;
    }
    
    /**
     * Set motivation
     *
     * @param string $motivation
     * @return Candidature
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;
    
        return $this;
    }

    /**
     * Get motivation
     *
     * @return string 
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Candidature
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
