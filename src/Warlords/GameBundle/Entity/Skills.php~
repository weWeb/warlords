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
     * @var string $skill
     */
    private $skill;

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
     * Set skill
     *
     * @param string $skill
     * @return Skills
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
    
        return $this;
    }

    /**
     * Get skill
     *
     * @return string 
     */
    public function getSkill()
    {
        return $this->skill;
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
     * Set user
     *
     * @param Warlords\GameBundle\Entity\User $user
     * @return Skills
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