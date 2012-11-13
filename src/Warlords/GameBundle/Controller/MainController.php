<?php
// src/Warlords/GameBundle/Controller/MainController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {	
        return $this->render('WarlordsGameBundle:Page:index.html.twig');
    }
}
