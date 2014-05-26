<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\AdministrateurRepository")
 */
class Administrateur
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
     * @ORM\OneToOne(targetEntity="Utilisateur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false, unique=true)
     */ 
    private $compteUser;
    
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
     * Set compteUser
     *
     * @param Utilisateur $compteUser
     * @return Administrateur
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
}
