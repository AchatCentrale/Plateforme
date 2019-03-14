<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegionsController extends Controller
{
    public function indexAction()
    {
        return $this->render("@Site/Regions/index.html.twig");
    }

    public function importAction()
    {



        return $this->render("@Site/Regions/import.html.twig");
    }

}
