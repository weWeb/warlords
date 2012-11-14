<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BuySoldierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('soldiers', 'text', array('label' => 'Soldiers - 50g','required' => false))
                ->add('knights', 'text', array('label' => 'Knights - 200g','required' => false))
                ->add('calvary', 'text', array('label' => 'Calvary - 500g','required' => false))
                ;
    }
    
    public function getName()
    {
        return 'buy';
    }
}
