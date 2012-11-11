<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Skill
 */
class Skill
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
     * @var boolean $isActive
     */
    private $isActive;

    /**
     * @var \DateTime $start_time
     */
    private $start_time;


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
     * @return Skill
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Skill
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
     * Set start_time
     *
     * @param \DateTime $startTime
     * @return Skill
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;
    
        return $this;
    }

    /**
     * Get start_time
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->start_time;
    }
    /**
     * @var Warlords\GameBundle\Entity\SkillList
     */
    private $skill;


    /**
     * Set skill
     *
     * @param Warlords\GameBundle\Entity\SkillList $skill
     * @return Skill
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
}