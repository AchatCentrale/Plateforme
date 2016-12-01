<?php

namespace AchatCentrale\CrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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


                return new Response('ok');

            }




        }





        //rendu
        return $this->render('AchatCentraleCrmBundle:Default:index.html.twig', array(
            'form' => $form->createView(),

        ));
    }


}
