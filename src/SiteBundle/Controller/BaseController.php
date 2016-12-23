<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Form\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy(array('usMail' => $data['email']));
            if ($data['Password'] == $user[0]->getUsPass()) {
                // si toute les infos sont correcte , l'user est connecté
                //TODO: Collé un cookies a l'utilisateur fraichement ajouté

                $cookie_info = array(

                    'name' => 'token_user', // Nom du cookie

                    'value' =>  $user[0]->getUsId(), // Valeur du cookie


                );

                $cookie_isConnected = array(

                    'name' => 'Is_connected', // Nom du cookie

                    'value' =>  true, // Valeur du cookie


                );

                $response = new Response();
                $cookie = new Cookie($cookie_info['name'], $cookie_info['value']);
                $cookie_isConnected = new Cookie($cookie_isConnected['name'], $cookie_isConnected['value']);

                $response->headers->setCookie($cookie);
                $response->headers->setCookie($cookie_isConnected);

                $response->send();

                return $this->redirectToRoute('index_auth');

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

        if($IsConnected == 1){
            $IdUser = $request->cookies->get('token_user');

            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->find($IdUser);

            return $this->render('@Site/Base/home.html.twig', array(
                "user" => $user
            ));
        }else {
            return $this->redirectToRoute('index');
        }
    }



    public function settingsAction(Request $request)
    {

        $IsConnected = $request->cookies->get('Is_connected');

        if($IsConnected == 1){
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
            return $this->redirectToRoute('index');
        }





    }


    public function logoutAction(Request $request)
    {
        $IsConnected = $request->cookies->get('Is_connected');


        if($IsConnected == 1){

            $response = new Response();
            $response->headers->clearCookie('Is_connected');
            $response->send();
        }

        return $this->redirectToRoute('index');


    }

}
