<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Form\UsersType;
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



    public function settingsAction(Request $request)
    {

        $IsConnected = $request->cookies->get('Is_connected');

        if($IsConnected == true){
            $IdUser = $request->cookies->get('token_user');
            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->find($IdUser);


            $form = $this->get('form.factory')->create(UsersType::class, $user);


            // le formulaire est recuperer dans la request
            $form->handleRequest($request);


            //traitement du formulaire
            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
            }

            return $this->render('@Site/Base/settings.html.twig', array(
                "user" => $user,
                'form' => $form->createView(),
            ));
        }else {
            return $this->redirectToRoute('index', array(), 307);
        }





    }




    public function testAction()
    {

        $rayon = $this->get('doctrine')
            ->getRepository('SiteBundle:Rayons', "centrale_produits")
            ->findAll()
        ;

        $categ = $this->get('doctrine')
            ->getRepository('AchatCentraleCrmBundle:CategRayons')
            ->findAll()
        ;





        return $this->render('@Site/test.html.twig', array(
            'rayon' => $rayon,
            'categ' => $categ
        ));

    }




}
