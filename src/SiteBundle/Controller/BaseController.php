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
    public function indexAction(Request $request)
    {



        // Creation d'un formulaire sans entité , pour l'auth
        $defaultData = array('Auth' => 'Données reçu du formulaire - HomeAction');
        $form = $this->createFormBuilder($defaultData)
            ->add('email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('send', SubmitType::class , array(
                "attr" => array(
                    "class" => "ink-button green")))
            ->getForm();


        // le formulaire est recuperer dans la request
        $form->handleRequest($request);

        //traitement du formulaire
        if ($form->isSubmitted() && $form->isValid() && $request->getMethod() == "POST") {

            $data = $form->getData();
            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy(array('usMail' => $data['email']));
            if ($data['Password'] == $user[0]->getUsPass()) {


                $response = new RedirectResponse('/home', 302);
                $response->headers->setCookie(new Cookie("token_user", $user[0]->getUsId(), time() + (3600 * 48) ));
                $response->headers->setCookie(new Cookie("Is_connected", 'true', time() + (3600 * 48) ));


                return $response;


            }
        }
        //rendu
        return $this->render('SiteBundle:Base:index.html.twig', array(
            'form' => $form->createView(),

        ));
    }





    public function indexAuthAction(Request $request)
    {
        $IsConnected = $request->cookies->get('Is_connected');

        if($IsConnected == true){
            $IdUser = $request->cookies->get('token_user');

            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->find($IdUser);

            return $this->render('@Site/Base/home.html.twig', array(
                "user" => $user
            ));
        }else {
            //it work
            return $this->redirectToRoute('index', array(), 307);
        }
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


    public function logoutAction(Request $request)
    {
        $IsConnected = $request->cookies->get('Is_connected');


        if($IsConnected == 1){

            $response = new Response();
            $response->headers->clearCookie('Is_connected');
            $response->send();
            return $this->redirectToRoute('index', array(), 307);

        }

        return $this->redirectToRoute('index');


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




        $result =  $categ = $this->get('doctrine')
            ->getRepository('AchatCentraleCrmBundle:CategRayons')
            ->findBy(array('raId' => $categ->getRaId()))
        ;
        dump($result);

        return $this->render('@Site/test.html.twig', array(
            'rayon' => $rayon,
            'categ' => $categ
        ));

    }




}
