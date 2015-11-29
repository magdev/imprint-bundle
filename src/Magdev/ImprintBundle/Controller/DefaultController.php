<?php

namespace Magdev\ImprintBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$data = $this->get('magdev_imprint.info')->info();
    	
        return $this->render('MagdevImprintBundle:Default:index.html.twig', array(
        	'info' => $data
        ));
    }
}
