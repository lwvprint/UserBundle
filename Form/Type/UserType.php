<?php

namespace LWV\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('username');
        $builder->add('email');
        $builder->add('profile', new ProfileType());
    }

    public function getName()
    {
        return 'user';
    }
}