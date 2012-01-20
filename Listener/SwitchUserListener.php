<?php

namespace LWV\UserBundle\Listener;

use Symfony\Component\Security\Http\Event\SwitchUserEvent;
use Symfony\Component\HttpFoundation\Session;

class SwitchUserListener
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


	public function onSwitchUser(SwitchUserEvent $event) {
		$this->session->set('previous_user', 'userName');
	}
}