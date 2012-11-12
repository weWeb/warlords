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
     * @var integer $level
     */
    private $level;

    /**
     * @var integer $exp
     */
    private $exp;

    /**
     * @var integer $sp
     */
    private $sp;
/**
     * @var integer $fame
     */
    private $fame;

    /**
     * @var integer $land
     */
    private $land;

    /**
     * @var integer $gold
     */
    private $gold;

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
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $skills;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set exp
     *
     * @param integer $exp
     * @return PlayerStats
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    
        return $this;
    }

    /**
     * Get exp
     *
     * @return integer 
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * Set sp
     *
     * @param integer $sp
     * @return PlayerStats
     */
    public function setSp($sp)
    {
        $this->sp = $sp;
    
        return $this;
    }

    /**
     * Get sp
     *
     * @return integer 
     */
    public function getSp()
    {
        return $this->sp;
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
     * Add skills
     *
     * @param Warlords\GameBundle\Entity\Skills $skills
     * @return PlayerStats
     */
    public function addSkill(\Warlords\GameBundle\Entity\Skills $skills)
    {
        $this->skills[] = $skills;
    
        return $this;
    }

    /**
     * Remove skills
     *
     * @param Warlords\GameBundle\Entity\Skills $skills
     */
    public function removeSkill(\Warlords\GameBundle\Entity\Skills $skills)
    {
        $this->skills->removeElement($skills);
    }

    /**
     * Get skills
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSkills()
    {
        return $this->skills;
    }
}