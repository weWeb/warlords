<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warlords\GameBundle\Entity\Events
 */
class Events
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $eventType;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $eventTime;

    /**
     * @var \Warlords\GameBundle\Entity\User
     */
    private $user;

    /**
     * @var \Warlords\GameBundle\Entity\User
     */
    private $user2;

    /**
     * @var \Warlords\GameBundle\Entity\Guild
     */
    private $guild;


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
     * Set eventType
     *
     * @param integer $eventType
     * @return Events
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    
        return $this;
    }

    /**
     * Get eventType
     *
     * @return integer 
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Events
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set eventTime
     *
     * @param \DateTime $eventTime
     * @return Events
     */
    public function setEventTime($eventTime)
    {
        $this->eventTime = $eventTime;
    
        return $this;
    }

    /**
     * Get eventTime
     *
     * @return \DateTime 
     */
    public function getEventTime()
    {
        return $this->eventTime;
    }

    /**
     * Set user
     *
     * @param \Warlords\GameBundle\Entity\User $user
     * @return Events
     */
    public function setUser(\Warlords\GameBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Warlords\GameBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user2
     *
     * @param \Warlords\GameBundle\Entity\User $user2
     * @return Events
     */
    public function setUser2(\Warlords\GameBundle\Entity\User $user2 = null)
    {
        $this->user2 = $user2;
    
        return $this;
    }

    /**
     * Get user2
     *
     * @return \Warlords\GameBundle\Entity\User 
     */
    public function getUser2()
    {
        return $this->user2;
    }

    /**
     * Set guild
     *
     * @param \Warlords\GameBundle\Entity\Guild $guild
     * @return Events
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
}
