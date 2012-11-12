<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\User
 */
class User
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $salt
     */
    private $salt;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var boolean $isActive
     */
    private $isActive;



    private $alliesWithMe;



    private $myAllies;


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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alliesWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myAllies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add alliesWithMe
     *
     * @param Warlords\GameBundle\Entity\User $alliesWithMe
     * @return User
     */
    public function addAlliesWithMe(\Warlords\GameBundle\Entity\User $alliesWithMe)
    {
        $this->alliesWithMe[] = $alliesWithMe;
    
        return $this;
    }

    /**
     * Remove alliesWithMe
     *
     * @param Warlords\GameBundle\Entity\User $alliesWithMe
     */
    public function removeAlliesWithMe(\Warlords\GameBundle\Entity\User $alliesWithMe)
    {
        $this->alliesWithMe->removeElement($alliesWithMe);
    }

    /**
     * Get alliesWithMe
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAlliesWithMe()
    {
        return $this->alliesWithMe;
    }

    /**
     * Add myAllies
     *
     * @param Warlords\GameBundle\Entity\User $myAllies
     * @return User
     */
    public function addMyAllie(\Warlords\GameBundle\Entity\User $myAllies)
    {
        $this->myAllies[] = $myAllies;
    
        return $this;
    }

    /**
     * Remove myAllies
     *
     * @param Warlords\GameBundle\Entity\User $myAllies
     */
    public function removeMyAllie(\Warlords\GameBundle\Entity\User $myAllies)
    {
        $this->myAllies->removeElement($myAllies);
    }

    /**
     * Get myAllies
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMyAllies()
    {
        return $this->myAllies;
    }
}