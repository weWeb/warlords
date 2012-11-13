<?php

namespace Warlords\GameBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            	->add('search_player_type', 'choice', array(

            			'choices' => array(	
            				'level' => 'Level',
            				'fame' => 'Fame',
            				'gold' => 'Gold',
            			),
            			'property_path' => false
            		)

        	)
        	->add('_', 'text', array('property_path' => false))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Warlords\GameBundle\Entity\PlayerStats'
        ));
    }

    public function getName()
    {
        return 'warlords_gamebundle_searchtype';
    }
}
