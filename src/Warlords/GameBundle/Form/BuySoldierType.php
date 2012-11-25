<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BuySoldierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('soldiers', 'integer', array('label' => 'Soldiers - 50g','required' => false))
                ->add('knights', 'integer', array('label' => 'Knights - 200g','required' => false))
                ->add('calvary', 'integer', array('label' => 'Calvary - 400g','required' => false))
                ;
    }
    
    public function getName()
    {
        return 'buy';
    }
}
