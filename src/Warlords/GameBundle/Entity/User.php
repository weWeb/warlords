<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean $isActive
     */
    private $isActive;
    
 
    private $alliesWithMe;

    private $myAllies;

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
        parent::__construct();
        $this->isActive = false;
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
    public function addMyAllies(\Warlords\GameBundle\Entity\User $myAllies)
    {
        $this->myAllies[] = $myAllies;
    
        return $this;
    }

    /**
     * Remove myAllies
     *
     * @param Warlords\GameBundle\Entity\User $myAllies
     */
    public function removeMyAllies(\Warlords\GameBundle\Entity\User $myAllies)
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

    /**
     * @var \Warlords\GameBundle\Entity\Playerstats
     */
    private $stats;


    /**
     * Set stats
     *
     * @param \Warlords\GameBundle\Entity\Playerstats $stats
     * @return User
     */
    public function setStats(\Warlords\GameBundle\Entity\Playerstats $stats = null)
    {
        $this->stats = $stats;
    
        return $this;
    }

    /**
     * Get stats
     *
     * @return \Warlords\GameBundle\Entity\Playerstats 
     */
    public function getStats()
    {
        return $this->stats;
    }
}
