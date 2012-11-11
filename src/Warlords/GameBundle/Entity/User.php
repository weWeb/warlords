<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;


class User implements UserInterface
{

    protected $id;


    protected $username;


    protected $salt;


    protected $password;


    protected $email;

    
    protected $guild;
    
    
    protected $land;
    
    
    protected $gold;
    
    
    protected $army;
    
    
    protected $allies;
    

    protected $isActive;
    
    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        //return $this->salt;
        return "";
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
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
     * @param bool $isActive
     * @return User
     */
    public function setIsActive(\bool $isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    public function isEqualTo(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Set guild
     *
     * @param string $guild
     * @return User
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;
    
        return $this;
    }

    /**
     * Get guild
     *
     * @return string 
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * Add allies
     *
     * @param Warlords\GameBundle\Entity\Ally $allies
     * @return User
     */
    public function addAllie(\Warlords\GameBundle\Entity\Ally $allies)
    {
        $this->allies[] = $allies;
    
        return $this;
    }

    /**
     * Remove allies
     *
     * @param Warlords\GameBundle\Entity\Ally $allies
     */
    public function removeAllie(\Warlords\GameBundle\Entity\Ally $allies)
    {
        $this->allies->removeElement($allies);
    }

    /**
     * Get allies
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAllies()
    {
        return $this->allies;
    }

    /**
     * Set land
     *
     * @param integer $land
     * @return User
     */
    public function setLand($land)
    {
        $this->land = $land;
    
        return $this;
    }

    /**
     * Get land
     *
     * @return integer 
     */
    public function getLand()
    {
        return $this->land;
    }

    /**
     * Set gold
     *
     * @param integer $gold
     * @return User
     */
    public function setGold($gold)
    {
        $this->gold = $gold;
    
        return $this;
    }

    /**
     * Get gold
     *
     * @return integer 
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set army
     *
     * @param integer $army
     * @return User
     */
    public function setArmy($army)
    {
        $this->army = $army;
    
        return $this;
    }

    /**
     * Get army
     *
     * @return integer 
     */
    public function getArmy()
    {
        return $this->army;
    }
}