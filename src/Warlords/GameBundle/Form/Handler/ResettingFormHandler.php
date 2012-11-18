<?php

namespace Warlords\GameBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\ResettingFormHandler as BaseHandler;
use FOS\UserBundle\Model\UserInterface;

class ResettingFormHandler extends BaseHandler
{
   public function process(UserInterface $user)
    {
        $this->form->setData(new ChangePassword());

        if ('POST' === $this->request->getMethod()) {
            $this->form->bind($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($user);

                return true;
            }
        }

        return false;
    }
}
