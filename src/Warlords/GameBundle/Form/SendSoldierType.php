<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SendSoldierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('soldiers', 'text', array('label' => 'Soldiers','required' => false))
                ->add('knights', 'text', array('label' => 'Knights','required' => false))
                ->add('calvary', 'text', array('label' => 'Calvary','required' => false))
                ;
    }
    
    public function getName()
    {
        return 'send_soldiers';
    }
}
