<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\Clients;
use AchatCentrale\CrmBundle\Form\ClientsType;
use AchatCentrale\CrmBundle\Form\UsersType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
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


        return $this->render('@Site/Base/home.html.twig', array());

    }

    public function whoAreAction(Request $request, $type)
    {

        $user = $this->getUser();


        switch ($type) {
            case "username":
                return new JsonResponse($user->getUsername(), 200);
                break;

        }

    }

    public function sendClientDetailMailAction(Request $request, $clientId)
    {

        $client_info = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy(array('ccId' => $clientId));

        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Vos codes pour la centrale')
            ->setFrom(array('contact@achatcentrale.fr' => "Votre centrale"))
            ->setTo('jb@achatcentrale.fr')
            ->setBody($this->renderView('SiteBundle:mail:mailDetailClient.html.twig', array(
                'client' => $client_info
            )), 'text/html');

        $mailer = $this->get('mailer');
        $mailer->send($message);
        $spool = $mailer->getTransport()->getSpool();
        $transport = $this->get('swiftmailer.transport.real');
        $spool->flushQueue($transport);
        return new Response('Mail envoyé');
    }


    public function countAgenceAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AchatCentraleCrmBundle:Clients');


        $count = $repository->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();

        return $count;

    }


    public function testAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('AchatCentraleCrmBundle:Clients');


        $count = $repository->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();


        dump($count);

        return $this->render('@AchatCentraleCrm/testView.html.twig');

    }


    public function testWithParamAction(Request $request, $id)
    {
        $panier = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Panier')->findAll();

        return $this->render('@Site/test.html.twig', array(
            'panier' => $panier
        ));

    }


}
