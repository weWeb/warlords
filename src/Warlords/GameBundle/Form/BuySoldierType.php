<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BuySoldierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('soldiers')
                ->add('knights')
                ->add('calvary')
                ;
    }
    
    public function getName()
    {
        return 'buy';
    }
}
