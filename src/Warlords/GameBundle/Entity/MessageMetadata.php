<?php

namespace Warlords\GameBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\MessageMetadata as BaseMessageMetadata;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_message_metadata")
 */
class MessageMetadata extends BaseMessageMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\MessageBundle\Entity\Message", inversedBy="metadata")
     */
    protected $message;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\UserBundle\Entity\User")
     */
    protected $participant;
}
