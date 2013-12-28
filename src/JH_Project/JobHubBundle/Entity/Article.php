<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="maj", type="date")
     */
    private $maj;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="Rubrique", inversedBy="articles", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="rubrique_id", referencedColumnName="id")
     */
    private $rubrique;
    
    /**
     * @ORM\OneToOne(targetEntity="Image", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $img;
    
   /**
     * @ORM\OneToOne(targetEntity="Video", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */ 
    private $video;

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
     * Set rubrique
     *
     * @param Rubrique $rubrique
     * @return Activite
     */
    public function setRubrique(Rubrique $rubrique)
    {
        $this->rubrique = $rubrique;
    
        return $this;
    }
    
    /**
     * Get rubrique
     *
     * @return Rubrique 
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }
      
    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Article
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
     * Set maj
     *
     * @param \DateTime $maj
     * @return Article
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
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    
        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }
    
    /**
     * Set img
     *
     * @param Image $img
     * @return Article
     */
    public function setImg(Image $img)
    {
        $this->img = $img;
    
        return $this;
    }

    /**
     * Get img
     *
     * @return Image 
     */
    public function getImg()
    {
        return $this->img;
    }
    
     /**
     * Set video
     *
     * @param Video $video
     * @return Article
     */
    public function setVideo(Video $video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return Video 
     */
    public function getvideo()
    {
        return $this->video;
    }
}
