<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CV
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\CVRepository")
 *
 * @IgnoreAnnotation("Assert")
 */
class CV
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
     * le titre donné par user
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * le nom de sauvegarde
     */
    public $save_name;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="maj", type="datetime")
     */
    private $maj;

    /**
     * chemin relatif
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;
    
    /**
     * @ORM\ManyToOne(targetEntity="Candidat", inversedBy="formations", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false,name="candidat_id", referencedColumnName="id")
     */
    private $candidat;
    
	/*
	 *  @Assert\File(maxSize="6000000")
	 */
	public $file;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;
    	
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
	 * @return CV
	 */
	
	public function setCandidat($candidat) {
		$this->candidat = $candidat;
		return $this;
	}
    /**
     * Set titre
     *
     * @param string $titre
     * @return CV
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get user_title
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set maj
     *
     * @param \DateTime $maj
     * @return CV
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
     * @return CV
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
      
    public function __construct()
	{
		$this->maj = new \DateTime('NOW');
		$this->enabled = true;
		$this->path = '';
	}   
	//asset path for twig
    public function getPath()
    {
        return 'bundles/jobhub/'.$this->getUploadDir().'/'.$this->path;
    }
    public function getAbsolutePath()
    {
        return $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        return __DIR__."/../../../../web/bundles/jobhub/".$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'user_uploads/CV';
    }
        
    public function upload()
	{
		if (null === $this->file) {
		    return;
		}
		$extension = $this->file->guessExtension();
		if (!$extension) {
			$extension = 'pdf';
		}
		$this->save_name = 'CV_'.$this->candidat->getId().'-'.$this->maj->format('YmdHis').'.'.$extension;
		$this->file->move($this->getUploadRootDir(), $this->save_name);
		$this->path = $this->save_name;
		$this->save_name = null;
		$this->file = null;
	}
	
	/**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->path) {
            unlink($this->getAbsolutePath());
        }
    }
}
