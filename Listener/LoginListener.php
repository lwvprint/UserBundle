<?php

namespace LWV\UserBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Session;

class LoginListener
{
    /**
     * @var Symfony\Component\HttpFoundation\Session
     */
    protected $sesion;

    /**
     * Constructor.
     *
     * @param Session $session The session service
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


	public function onLogin(InteractiveLoginEvent $event) {
		$user = $event->getAuthenticationToken()->getUsername();
		$this->session->set('master_login', $user);
	}
}