<?php

namespace Warlords\GameBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\ChangePasswordFormHandler as BaseHandler;
use FOS\UserBundle\Form\Model\ChangePassword;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordFormHandler extends BaseHandler
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
