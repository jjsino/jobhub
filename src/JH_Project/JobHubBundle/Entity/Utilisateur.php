<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as User;


/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\UtilisateurRepository")
 */
class Utilisateur extends User
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
    public function __contruct(){
	parent::__contruct();
	//TODO Contructor
    }
}
