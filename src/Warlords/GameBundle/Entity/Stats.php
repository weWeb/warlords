<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Stats
 */
class Stats
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
     * @var integer $army
     */
    private $army;


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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * Set user
     *
     * @param Warlords\GameBundle\Entity\User $user
     * @return Stats
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
     * @param Warlords\GameBundle\Entity\Skill $skills
     * @return Stats
     */
    public function addSkill(\Warlords\GameBundle\Entity\Skill $skills)
    {
        $this->skills[] = $skills;
    
        return $this;
    }

    /**
     * Remove skills
     *
     * @param Warlords\GameBundle\Entity\Skill $skills
     */
    public function removeSkill(\Warlords\GameBundle\Entity\Skill $skills)
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