<?php

namespace LWV\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use LWV\UserBundle\Entity\User;
use LWV\UserBundle\Form\Type\UserType;
//use LWV\UserBundle\Form\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    
    public function profileAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $form = $this->createForm(new UserType(), $user);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database

                //return $this->redirect($this->generateUrl('dashboard'));
            }
            
        }
        
        return $this->render('LWVUserBundle:Dashboard:profile.html.twig', array('form' => $form->createView(),));
    }
    
    public function passwordAction(Request $request)
    {
        
        $user = new User;
        
        $form = $this->createFormBuilder($user)
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'first_name' => 'New Password',
                    'second_name' => 'Confirm Password',
                    'invalid_message' => "The passwords don't match!"))
                ->getForm();
        
        //$form = $this->createForm(new PasswordType());
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // perform some action, such as saving the task to the database

                //return $this->redirect($this->generateUrl('dashboard'));
            }
            
        }
        
        return $this->render('LWVUserBundle:Dashboard:password.html.twig', array('form' => $form->createView()));
    }
}
