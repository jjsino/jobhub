<?php

namespace JH_Project\JobHubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JH_Project\JobHubBundle\Entity\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=255)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="liste_noire", type="boolean")
     */
    private $listeNoire;


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
     * Set login
     *
     * @param string $login
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return Utilisateur
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    
        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Utilisateur
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
     * Set listeNoire
     *
     * @param boolean $listeNoire
     * @return Utilisateur
     */
    public function setListeNoire($listeNoire)
    {
        $this->listeNoire = $listeNoire;
    
        return $this;
    }

    /**
     * Get listeNoire
     *
     * @return boolean 
     */
    public function getListeNoire()
    {
        return $this->listeNoire;
    }
}
