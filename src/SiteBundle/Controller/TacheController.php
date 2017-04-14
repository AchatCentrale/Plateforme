<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TacheController extends Controller
{


    public function TacheAction()
    {
        return $this->render('@Site/Base/tache.home.html.twig');
    }


}
