<?php

namespace LWV\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('pubName');
        $builder->add('address1');
        $builder->add('address2');
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