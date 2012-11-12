<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Skills
 */
class Skills
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
     * @var integer $instances
     */
    private $instances;

    /**
     * @var boolean $isActive
     */
    private $isActive;

    /**
     * @var \DateTime $casted_time
     */
    private $casted_time;

    /**
     * @var Warlords\GameBundle\Entity\SkillList
     */
    private $skill;

    /**
     * @var Warlords\GameBundle\Entity\PlayerStats
     */
    private $stats;


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
     * @return Skills
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
     * Set instances
     *
     * @param integer $instances
     * @return Skills
     */
    public function setInstances($instances)
    {
        $this->instances = $instances;
    
        return $this;
    }

    /**
     * Get instances
     *
     * @return integer 
     */
    public function getInstances()
    {
        return $this->instances;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Skills
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
     * Set casted_time
     *
     * @param \DateTime $castedTime
     * @return Skills
     */
    public function setCastedTime($castedTime)
    {
        $this->casted_time = $castedTime;
    
        return $this;
    }

    /**
     * Get casted_time
     *
     * @return \DateTime 
     */
    public function getCastedTime()
    {
        return $this->casted_time;
    }

    /**
     * Set skill
     *
     * @param Warlords\GameBundle\Entity\SkillList $skill
     * @return Skills
     */
    public function setSkill(\Warlords\GameBundle\Entity\SkillList $skill = null)
    {
        $this->skill = $skill;
    
        return $this;
    }

    /**
     * Get skill
     *
     * @return Warlords\GameBundle\Entity\SkillList 
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set stats
     *
     * @param Warlords\GameBundle\Entity\PlayerStats $stats
     * @return Skills
     */
    public function setStats(\Warlords\GameBundle\Entity\PlayerStats $stats = null)
    {
        $this->stats = $stats;
    
        return $this;
    }

    /**
     * Get stats
     *
     * @return Warlords\GameBundle\Entity\PlayerStats 
     */
    public function getStats()
    {
        return $this->stats;
    }
}