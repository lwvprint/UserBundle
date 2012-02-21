<?php
/*
namespace LWV\UserBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function userMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root');
        $menu->setCurrentUri($this->container->get('request')->getRequestUri());
        
        $menu->addChild('Home', array('route' => ''));
        $menu->addChild('Account', array('route' => 'profile'));
        $menu->addChild('FAQ');
        $menu->addChild('Logout', array('route' => 'logout'));

        return $menu;
    }
}

*/
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;

$factory = new MenuFactory();
$menu = $factory->createItem('My menu');
$menu->addChild('Home', array('uri' => '/'));
$menu->addChild('Comments', array('uri' => '#comments'));
$menu->addChild('Symfony2', array('uri' => 'http://symfony-reloaded.org/'));
$menu->addChild('Coming soon');

$renderer = new ListRenderer();
echo $renderer->render($menu);