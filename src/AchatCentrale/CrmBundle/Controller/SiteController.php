<?php

namespace AchatCentrale\CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{



    public function GestionAction(Request $request)
    {


        return $this->render('@AchatCentraleCrm/Default/index.html.twig');


    }

    public function ViewAllClientAction(Request $request)
    {

        $clients = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findAll();



        dump($clients);

        return $this->render('@AchatCentraleCrm/Clients/show.client.html.twig', array(
            "client" => $clients
        ));


    }


}
