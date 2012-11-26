<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Guild
 */
class Guild
{
 
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Warlords\GameBundle\Entity\User
     */
    private $leader;


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
     * @return Guild
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
     * Set leader
     *
     * @param \Warlords\GameBundle\Entity\User $leader
     * @return Guild
     */
    public function setLeader(\Warlords\GameBundle\Entity\User $leader = null)
    {
        $this->leader = $leader;
    
        return $this;
    }

    /**
     * Get leader
     *
     * @return \Warlords\GameBundle\Entity\User 
     */
    public function getLeader()
    {
        return $this->leader;
    }
}