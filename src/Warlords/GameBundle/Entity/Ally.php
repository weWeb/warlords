<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Ally
 */
class Ally
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $ally
     */
    private $ally;

    /**
     * @var boolean $isActive
     */
    private $isActive;

    /**
     * @var boolean $isBlocked
     */
    private $isBlocked;


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
     * Set ally
     *
     * @param string $ally
     * @return Ally
     */
    public function setAlly($ally)
    {
        $this->ally = $ally;
    
        return $this;
    }

    /**
     * Get ally
     *
     * @return string 
     */
    public function getAlly()
    {
        return $this->ally;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Ally
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
     * @var Warlords\GameBundle\Entity\User
     */
    private $user;


    /**
     * Set isBlocked
     *
     * @param boolean $isBlocked
     * @return Ally
     */
    public function setIsBlocked($isBlocked)
    {
        $this->isBlocked = $isBlocked;
    
        return $this;
    }

    /**
     * Get isBlocked
     *
     * @return boolean 
     */
    public function getIsBlocked()
    {
        return $this->isBlocked;
    }

    /**
     * Set user
     *
     * @param Warlords\GameBundle\Entity\User $user
     * @return Ally
     */
    public function setUser(\Warlords\GameBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Warlords\GameBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}