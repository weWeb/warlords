<?php

namespace Warlords\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecurityQuestions
 */
class SecurityQuestions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $answer;

    /**
     * @var string
     */
    private $question;

    /**
     * @var \Warlords\GameBundle\Entity\User
     */
    private $user_id;


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
     * Set answer
     *
     * @param string $answer
     * @return SecurityQuestions
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return SecurityQuestions
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set user_id
     *
     * @param \Warlords\GameBundle\Entity\User $userId
     * @return SecurityQuestions
     */
    public function setUserId(\Warlords\GameBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return \Warlords\GameBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    /**
     * @var \Warlords\GameBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Warlords\GameBundle\Entity\User $user
     * @return SecurityQuestions
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
}