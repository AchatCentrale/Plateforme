<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Form\UsersType;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{



    public function indexAuthAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }


        return $this->render('@Site/Base/home.html.twig', array(

        ));

    }

    public function clientAction(Request $request)
    {

        $client_users = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findAll();

        return $this->render('@Site/Base/client.html.twig', array(
            "client" => $client_users
        ));
    }

    public function clientByIdAction(Request $request, $id)
    {


        $client_users = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy(array('cl' => $id));


        dump($client_users);

        return $this->render('@Site/Base/clientListe.html.twig', array(
            'client' => $client_users
        ));
    }






    public function settingsAction(Request $request)
    {

        $userActual = $this->get('security.token_storage')->getToken()->getUser();

        $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy(array("usMail" => $userActual));
        dump($user);
        $form = $this->get('form.factory')->create(UsersType::class, $user[0]);


        // le formulaire est recuperer dans la request
        $form->handleRequest($request);


        //traitement du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

           dump($data);
        }

        return $this->render('@Site/Base/settings.html.twig', array(
            'form' => $form->createView()
        ));



    }




    public function testAction()
    {

        $produitAll = $this->getDoctrine()->getEntityManager('centrale_produits')->getRepository('SiteBundle:Produits')->findAll();





        return $this->render('@Site/test.html.twig', array(
            'produits' => $produitAll
        ));

    }





    public function testWithParamAction(Request $request, $id)
    {



        $panier = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Panier')->findAll();


        return $this->render('@Site/test.html.twig', array(
            'panier' => $panier
        ));

    }




}
