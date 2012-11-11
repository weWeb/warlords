<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\PlayerStats
 */
class PlayerStats
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $gold
     */
    private $gold;

    /**
     * @var integer $land
     */
    private $land;

    /**
     * @var integer $fame
     */
    private $fame;

    /**
     * @var integer $infantry
     */
    private $infantry;

    /**
     * @var integer $knights
     */
    private $knights;

    /**
     * @var integer $calvary
     */
    private $calvary;

    /**
     * @var Warlords\GameBundle\Entity\User
     */
    private $user;


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
     * Set gold
     *
     * @param integer $gold
     * @return PlayerStats
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
     * Set land
     *
     * @param integer $land
     * @return PlayerStats
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
     * Set fame
     *
     * @param integer $fame
     * @return PlayerStats
     */
    public function setFame($fame)
    {
        $this->fame = $fame;
    
        return $this;
    }

    /**
     * Get fame
     *
     * @return integer 
     */
    public function getFame()
    {
        return $this->fame;
    }

    /**
     * Set infantry
     *
     * @param integer $infantry
     * @return PlayerStats
     */
    public function setInfantry($infantry)
    {
        $this->infantry = $infantry;
    
        return $this;
    }

    /**
     * Get infantry
     *
     * @return integer 
     */
    public function getInfantry()
    {
        return $this->infantry;
    }

    /**
     * Set knights
     *
     * @param integer $knights
     * @return PlayerStats
     */
    public function setKnights($knights)
    {
        $this->knights = $knights;
    
        return $this;
    }

    /**
     * Get knights
     *
     * @return integer 
     */
    public function getKnights()
    {
        return $this->knights;
    }

    /**
     * Set calvary
     *
     * @param integer $calvary
     * @return PlayerStats
     */
    public function setCalvary($calvary)
    {
        $this->calvary = $calvary;
    
        return $this;
    }

    /**
     * Get calvary
     *
     * @return integer 
     */
    public function getCalvary()
    {
        return $this->calvary;
    }

    /**
     * Set user
     *
     * @param Warlords\GameBundle\Entity\User $user
     * @return PlayerStats
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
    /**
     * @var integer $experience
     */
    private $experience;

    /**
     * @var integer $level
     */
    private $level;


    /**
     * Set experience
     *
     * @param integer $experience
     * @return PlayerStats
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return PlayerStats
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }
}