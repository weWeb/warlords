<?php
// src/Warlords/GameBundle/Controller/PageController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Warlords\GameBundle\Entity\User;
use Warlords\GameBundle\Entity\Ally;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('WarlordsGameBundle:Page:index.html.twig');
    }
    
    public function playerAction()
    {
    	return $this->render('WarlordsGameBundle:Page:player.html.twig');
    }
    
    
}
