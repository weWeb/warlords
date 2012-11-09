<?php
// src/Warlords/GameBundle/Entity/Ally.php

namespace Warlords\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;



class Ally
{
	protected $id;
	
	protected $user;
	
	protected $ally;
	
	protected $isActive;


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