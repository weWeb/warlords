<?php

namespace Warlords\GameBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WarlordsGameBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
