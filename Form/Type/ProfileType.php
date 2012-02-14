<?php

namespace LWV\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('pubName', null, array('label' => 'Pub Name'));
        $builder->add('address1', null, array('label' => 'Address 1'));
        $builder->add('address2', null, array('label' => 'Address 2'));
        $builder->add('city');
        $builder->add('county');
        $builder->add('postcode');
        $builder->add('telephone');
        
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'LWV\UserBundle\Entity\Profile',
        );
    }

    public function getName()
    {
        return 'profile';
    }
}