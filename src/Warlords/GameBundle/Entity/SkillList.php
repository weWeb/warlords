<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\SkillList
 */
class SkillList
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var integer $base_power
     */
    private $base_power;


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
     * Set name
     *
     * @param string $name
     * @return SkillList
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set base_power
     *
     * @param integer $basePower
     * @return SkillList
     */
    public function setBasePower($basePower)
    {
        $this->base_power = $basePower;
    
        return $this;
    }

    /**
     * Get base_power
     *
     * @return integer 
     */
    public function getBasePower()
    {
        return $this->base_power;
    }
}