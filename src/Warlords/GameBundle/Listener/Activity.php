<?php
//http://jameshalsall.co.uk/recording-last-activity-for-users-in-symfony2-fosuserbundle/

namespace Warlords\GameBundle\Listener;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use DateTime;
use Warlords\GameBundle\Entity\User;



class Activity
{
    protected $context;
    protected $em;
    
    public function __construct(SecurityContext $context, Doctrine $doctrine)
    {
        $this->context = $context;
        $this->em = $doctrine->getEntityManager();
    }
    /**
     * On each request we want to update the user's last activity datetime
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event
     * @return void
     */
     
     
    public function onCoreController(FilterControllerEvent $event)
    {
        $user = $this->context->getToken()->getUser();
        if ($event->getRequestType() !== \Symfony\Component\HttpKernel\HttpKernel::MASTER_REQUEST) {
		return;
	} elseif($user instanceof User) {
            //here we can update the user as necessary
            $user->setLastAccess(new DateTime());
            $user->setIsActive(true);
            $this->em->persist($user);
            $this->em->flush();
        }
    }
}

?>

