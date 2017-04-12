<?php

namespace AchatCentrale\CrmBundle\Controller;

use AchatCentrale\CrmBundle\Entity\Clients;
use AchatCentrale\CrmBundle\Form\ClientsType;
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

    public function ViewAllClientAction()
    {

        $clients = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findAll();



        dump($clients);

        return $this->render('@AchatCentraleCrm/Clients/show.client.html.twig', array(
            "client" => $clients
        ));


    }

    public function NewClientAction (Request $request)
    {

        $clients = new Clients();

        $form = $this->get('form.factory')->create(ClientsType::class, $clients);

        // le formulaire est recuperer dans la request
        $form->handleRequest($request);


        //traitement du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }



        return $this->render('@AchatCentraleCrm/Clients/new.client.html.twig', array(
            'form' => $form->createView()

        ));


    }



    public function UpdateClientAction (Request $request, $id)
    {
        $clients = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findOneBy(array("clId" => $id));
        $form = $this->get('form.factory')->create(ClientsType::class, $clients);
        // le formulaire est recuperer dans la request
        $form->handleRequest($request);
        //traitement du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }
        return $this->render('@AchatCentraleCrm/Clients/update.client.html.twig', array(
            'form' => $form->createView()

        ));
    }

    public function DeleteClientAction ( $id)
    {
        $clients = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findOneBy(array("clId" => $id));


        $em = $this->getDoctrine()->getManager();
        $em->remove($clients);
        $em->flush();

        $response = $this->redirectToRoute('vue_alll');

        return $response;
    }


}
