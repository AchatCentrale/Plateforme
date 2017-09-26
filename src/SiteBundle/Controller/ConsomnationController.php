<?php

namespace SiteBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ConsomnationController extends Controller
{


    public function indexAction(Request $request){


        $startM = $request->query->get('startM');
        $startY = $request->query->get('startY');
        $endY = $request->query->get('endY');
        $endM = $request->query->get('endM');





        return $this->render('@Site/Consomnation/index.html.twig', []);
    }

}


