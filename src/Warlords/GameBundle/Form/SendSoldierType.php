<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SendSoldierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('soldiers', 'integer', array('label' => 'Soldiers','required' => false))
                ->add('knights', 'integer', array('label' => 'Knights','required' => false))
                ->add('calvary', 'integer', array('label' => 'Calvary','required' => false))
                ;
    }
    
    public function getName()
    {
        return 'send_soldiers';
    }
}
