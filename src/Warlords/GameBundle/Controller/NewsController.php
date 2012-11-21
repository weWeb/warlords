<?php
// src/Warlords/GameBundle/Controller/NewsController.php

namespace Warlords\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function recentNewsAction()
    {
        $dir = $this->container->getParameter('news_dir');
		$newslist = array();

		$use_errors = libxml_use_internal_errors(true);
	
		$xmlInDir = scandir($dir, 1); // scan in decsending to display the newest 

		foreach($xmlInDir as $xmlFile) {
		
 
			// Look for XML files
			if(preg_match('/.*\.xml$/i', $xmlFile )) { 
				$xml = simplexml_load_file($dir . $xmlFile);	
				
				if (!$xml) {
					$errors = libxml_get_errors();
					foreach ($errors as $error) {
						echo "Error Parsing XML '" . $xmlFile . "': ". trim($error->message) . "\n  Line: $error->line" . "\n  Column: $error->column";
   					}
					libxml_clear_errors();
					libxml_use_internal_errors($use_errors);
				} else {
					foreach($xml->children() as $child) {
  						$output[$child->getName()] = str_replace("\n", "<br>",$child);
					}
					$newslist[$xmlFile] = $output;
				}	
			}
		}
        return $this->render('WarlordsGameBundle:Page:newsList.html.twig', array('newslist' => $newslist));
    }
}

