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

    public function HomeAction(Request $request)
    {



        // Creation d'un formulaire sans entité , pour l'auth
        $defaultData = array('Auth' => 'Données reçu du formulaire - HomeAction');
        $form = $this->createFormBuilder($defaultData)
            ->add('email', EmailType::class)
            ->add('Password', PasswordType::class)
            ->add('send', SubmitType::class)
            ->getForm();





        // le formulaire est recuperer dans la request
        $form->handleRequest($request);


        //traitement du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();



            $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy(array('usMail' =>$data['email']  ));


            if($data['Password'] == $user[0]->getUsPass()){
                // si toute les infos sont correcte , l'user est connecté
                //TODO: Collé un cookies a l'utilisateur fraichement ajouté

                $cookie_info = array(

                    'name' => 'token_user', // Nom du cookie

                    'value' => 'Valeur du cookie', // Valeur du cookie

                    'time' => time() + 3600 * 24 * 7 // Durée de vie du cookie

                );
                $response = new Response();
                $cookie = new Cookie($cookie_info['name'], $cookie_info['value'], $cookie_info['time']);

                $response->headers->setCookie($cookie);

                $response->send();

                return $this->redirectToRoute('crm_home_auth');

            }

        }

        //rendu
        return $this->render('AchatCentraleCrmBundle:Default:index.html.twig', array(
            'form' => $form->createView(),

        ));
    }




    public function HomeAuthAction()
    {



        return $this->render('AchatCentraleCrmBundle:AuthViews:index.html.twig');
    }







}
