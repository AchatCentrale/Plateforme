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



        return $this->render('@Site/Base/clientListe.html.twig', array(
            'client' => $client_users
        ));
    }

    public function sendClientDetailMailAction(Request $request, $clientId)
    {




        $client_info = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy(array('cl' => $clientId));



        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('contact@achatcentrale.fr')
            ->setTo('Jbagostin@gmail.com')
            ->setBody($this->renderView('SiteBundle:mail:mailDetailClient.html.twig', array(
                'client' => $client_info
            )), 'text/html')

        ;

        $mailer = $this->get('mailer');

        $mailer->send($message);

        $spool = $mailer->getTransport()->getSpool();

        $transport = $this->get('swiftmailer.transport.real');

        $spool->flushQueue($transport);


        return new Response('jb tes trop fort');
    }





    public function settingsAction(Request $request)
    {

        $userActual = $this->get('security.token_storage')->getToken()->getUser();

        $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy(array("usMail" => $userActual));
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
        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('Jbagostin@gmail.com')
            ->setTo('Jbagostin@gmail.com')
            ->setBody($this->renderView('SiteBundle:mail:mail.html.twig'), 'text/html')

        ;

        $mailer = $this->get('mailer');

        $mailer->send($message);

        $spool = $mailer->getTransport()->getSpool();

        $transport = $this->get('swiftmailer.transport.real');

        $spool->flushQueue($transport);

        return $this->render('@Site/test.html.twig');

    }





    public function testWithParamAction(Request $request, $id)
    {



        $panier = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Panier')->findAll();


        return $this->render('@Site/test.html.twig', array(
            'panier' => $panier
        ));

    }




}
