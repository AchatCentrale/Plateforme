<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SiteAcController extends Controller
{
    public function indexAction($name)
    {

        return new Response("ok", 200);
    }
}
