<?php
namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class ProfileController extends Controller{
    public function profileAction(){
        $usr = $this->get('security.context')->getToken()->getUser();
        $id = $usr->getID();
        return $this->render('WarlordsGameBundle:Page:profile.html.twig', array( 'userID' => $id));
    }
}
?>
