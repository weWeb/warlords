<?php
namespace Warlords\GameBundle\Twig;

class WarlordsExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            'setCurrentURI' => new \Twig_Function_Method($this, 'setCurrentURI'),
        );
    }

    public static function setCurrentURI($session, $URI) {
        $session->set('LAST_URI', $URI);
    }  

    public function getName()
    {
        return 'warlords_extension';
    }
}
