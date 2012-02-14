<?php

namespace LWV\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\CallbackValidator;

class PasswordType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('newPassword', 'password', array('label' => 'New Password', 'property_path' => false));
        $builder->add('confirmPassword', 'password', array('label' => 'Confirm Password', 'property_path' => false));
        $builder->addValidator(new CallbackValidator(function($form)
            {
                if($form['confirmPassword']->getData() != $form['newPassword']->getData()) {
                    $form['confirmPassword']->addError(new FormError('Passwords must match.'));
                }
            }));
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'LWV\UserBundle\Entity\User',
        );
    }

    public function getName()
    {
        return 'changepass';
    }
}