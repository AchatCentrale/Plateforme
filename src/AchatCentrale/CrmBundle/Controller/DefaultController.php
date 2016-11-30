<?php

namespace AchatCentrale\CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AchatCentraleCrmBundle:Default:index.html.twig');
    }
}
