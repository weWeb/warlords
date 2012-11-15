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