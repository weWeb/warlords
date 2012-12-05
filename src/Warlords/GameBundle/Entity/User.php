<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\MessageBundle\Model\ParticipantInterface;

/**
 * User
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $lastAccess;


    /**
     * @var \Warlords\GameBundle\Entity\PlayerStats
     */
    private $stats;

    /**
     * @var \Warlords\GameBundle\Entity\Guild
     */
    private $guild;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $alliesWithMe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $myAllies;

    /**
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
        $this->isActive = false;
        $this->alliesWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myAllies = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lastAccess
     *
     * @param \DateTime $lastAccess
     * @return User
     */
    public function setLastAccess($lastAccess)
    {
        $this->lastAccess = $lastAccess;
    
        return $this;
    }

    /**
     * Get lastAccess
     *
     * @return \DateTime 
     */
    public function getLastAccess()
    {
        return $this->lastAccess;
    }


    /**
     * Set stats
     *
     * @param \Warlords\GameBundle\Entity\PlayerStats $stats
     * @return User
     */
    public function setStats(\Warlords\GameBundle\Entity\PlayerStats $stats = null)
    {
        $this->stats = $stats;
    
        return $this;
    }

    /**
     * Get stats
     *
     * @return \Warlords\GameBundle\Entity\PlayerStats 
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set guild
     *
     * @param \Warlords\GameBundle\Entity\Guild $guild
     * @return User
     */
    public function setGuild(\Warlords\GameBundle\Entity\Guild $guild = null)
    {
        $this->guild = $guild;
    
        return $this;
    }

    /**
     * Get guild
     *
     * @return \Warlords\GameBundle\Entity\Guild 
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * Add alliesWithMe
     *
     * @param \Warlords\GameBundle\Entity\User $alliesWithMe
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
     * @param \Warlords\GameBundle\Entity\User $alliesWithMe
     */
    public function removeAlliesWithMe(\Warlords\GameBundle\Entity\User $alliesWithMe)
    {
        $this->alliesWithMe->removeElement($alliesWithMe);
    }

    /**
     * Get alliesWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAlliesWithMe()
    {
        return $this->alliesWithMe;
    }

    /**
     * Add myAllies
     *
     * @param \Warlords\GameBundle\Entity\User $myAllies
     * @return User
     */
    public function addMyAllies(\Warlords\GameBundle\Entity\User $myAllies)
    {
        $this->myAllies[] = $myAllies;
    
        return $this;
    }

    /**
     * Remove myAllies
     *
     * @param \Warlords\GameBundle\Entity\User $myAllies
     */
    public function removeMyAllies(\Warlords\GameBundle\Entity\User $myAllies)
    {
        $this->myAllies->removeElement($myAllies);
    }

    /**
     * Get myAllies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyAllies()
    {
        return $this->myAllies;
    }
    
    
    /**
     * Add new ally
     *
     * @param Warlords\GameBundle\Entity\User
     */
    public function addAlly(User $user)
    {
        $user->alliesWithMe[] = $this;
        $this->myAllies[] = $user;
    }
    
    
}
