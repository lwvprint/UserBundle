<?php

namespace LWV\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PasswordType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('password', null, array('type' => 'password'));
        //$builder->add('confirmPassword');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'LWV\UserBundle\Entity\User',
        );
    }

    public function getName()
    {
        return 'password';
    }
}