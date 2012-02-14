<?php

namespace LWV\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use LWV\UserBundle\Entity\User;
use LWV\UserBundle\Form\Type\UserType;
//use LWV\UserBundle\Form\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Form\FormError;

class DashboardController extends Controller
{
    
    public function profileAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $form = $this->createForm(new UserType(), $user);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Get $_POST data and submit to DB
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                
                // Set "success" flash notification
                $this->get('session')->setFlash('success', 'Profile saved.');
                
                return $this->redirect($this->generateUrl('profile'));
            }
            
        }
        
        return $this->render('LWVUserBundle:Dashboard:profile.html.twig', array('form' => $form->createView(),));
    }
    
    public function passwordAction(Request $request)
    {
        $id = $this->get('security.context')->getToken()->getUser()->getId();
        
        $user = $this->getDoctrine()
                ->getRepository('LWVUserBundle:User')
                ->find($id);
        
        $form = $this->createFormBuilder($user)
                ->add('oldPassword', 'password', array('label' => 'Old Password', 'property_path' => false))
                ->add('newPassword', 'password', array('label' => 'New Password', 'property_path' => false))
                ->add('confirmPassword', 'password', array('label' => 'Confirm Password', 'property_path' => false))
                ->addValidator(new CallbackValidator(function($form) use($user)
                {
                    
                    $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
                    $password = $encoder->encodePassword($form['oldPassword']->getData(), $user->getSalt());
                    
                    if($password != $user->getPassword()) {
                        $form['oldPassword']->addError(new FormError('Incorrect password'));
                    }
                    
                    if($form['confirmPassword']->getData() != $form['newPassword']->getData()) {
                        $form['confirmPassword']->addError(new FormError('Passwords must match.'));
                    }
                    if($form['newPassword']->getData() == '') {
                        $form['newPassword']->addError(new FormError('Password cannot be blank.'));
                    }
                }))
                ->getForm();
        
        //$form = $this->createForm(new PasswordType());
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $postData = $request->request->get('form');
                $newPassword = $postData['newPassword'];
                
                $encoder = new MessageDigestPasswordEncoder('sha1', false, 1);
                $password = $encoder->encodePassword($newPassword, $user->getSalt());
                $user->setPassword($password);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
                
                $this->get('session')->setFlash('success', 'Password changed.');
                
                return $this->redirect($this->generateUrl('password'));
            }
            
        }
        
        return $this->render('LWVUserBundle:Dashboard:password.html.twig', array('form' => $form->createView()));
    }
}
