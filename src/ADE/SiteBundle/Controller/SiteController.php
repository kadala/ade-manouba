<?php

namespace ADE\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\MenuFactory;

class SiteController extends Controller
{
	public function homeAction()
	{
		return $this->render ('ADESiteBundle:Site:home.html.twig');
	}
	
	public function headerAction()
	{
		return $this->render ('ADESiteBundle:Site:header.html.twig');
	}
	
	public function menuAction($route) 
    {
        $translator = $this->get('translator');
        $factory = new MenuFactory();
        $menu = $factory->createItem('My menu');        
        $menu->setCurrentUri($this->generateUrl($route));
        $menu->addChild('Home', array('uri' => $this->generateUrl('homepage'), 'label' => $translator->trans('ade_site_menu_home')));
        $menu->addChild('actualite', array('uri' => '#', 'label' => $translator->trans('ade_site_menu_actualite')));
        $menu->addChild('association', array('uri' =>'#', 'label' => $translator->trans('ade_site_menu_association')));
        $menu->addChild('rêves', array('uri' => '#', 'label' => $translator->trans('ade_site_menu_reves')));
        $menu->addChild('partenaires', array('uri' => '#', 'label' => $translator->trans('ade_site_menu_partenaires')));
        $menu->addChild('Espace Presse', array('uri' => '#', $translator->trans('ade_site_menu_presse')));
        
        return $this->render('ADESiteBundle:Site:menu.html.twig', array('menu' => $menu));
	}
	

	public function footerAction()
	{
		return $this->render('ADESiteBundle:Site:footer.html.twig');
	}
}
