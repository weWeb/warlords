<?php
namespace Warlords\GameBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

use FOS\MessageBundle\Entity\ThreadMetadata as BaseThreadMetadata;

/**
 * @ORM\Entity
 * @ORM\Table(name="message_thread_metadata")
 */
class ThreadMetadata extends BaseThreadMetadata
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\MessageBundle\Entity\Thread", inversedBy="metadata")
     */
    protected $thread;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\UserBundle\Entity\User")
     */
    protected $participant;

}
