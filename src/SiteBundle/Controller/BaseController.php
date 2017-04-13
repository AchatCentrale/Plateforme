<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\Clients;
use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use SiteBundle\Form\ClientsTachesType;
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

       /* if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }*/


        return $this->render('@Site/Base/home.html.twig', array());

    }


    public function ClientAction(Request $request)
    {

        /* if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
             throw $this->createAccessDeniedException();
         }*/

        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findAll();

        return $this->render('@Site/Base/client.html.twig', [
            "client" => $restresult
        ]);

    }

    public function ClientGeneralAction($id)
    {

        /* if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
             throw $this->createAccessDeniedException();
         }*/

        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy(array('clId' => $id));

        return $this->render('@Site/Base/client.general.html.twig', [
            "client" => $restresult
        ]);

    }

    public function ClientAdresseAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(array(
            "clId" => $id,
        ));

        return $this->render('@Site/Base/client.adresse.html.twig', [
            "client" => $restresult
        ]);

    }

    public function ClientStatutAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(array(
            "clId" => $id,
        ));

        return $this->render('@Site/Base/client.status.html.twig', [
            "client" => $restresult
        ]);

    }

    public function NewTaskAction(Request $request)
    {

        $task = new ClientsTaches();
        $form = $this->createForm(ClientsTachesType::class, $task, [
            'action' => $this->generateUrl('new-task'),
            'method' => 'POST',
        ]);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
            return 'Action sauvegardé';
        }

        return $this->render('SiteBundle:ui-element:action.form.html.twig', [
            'form' => $form->createView(),
         ]);



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


        $db = $this->get('doctrine.dbal.centrale_produits_connection');
        $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');



        $result = 'SELECT FO_RAISONSOC, COUNT(CE_ID) AS NB_CMD, COUNT(MESSAGE_ENTETE.ME_ID) AS NB_TICKETS
        FROM dbo.MESSAGE_ENTETE
        INNER JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS ON MESSAGE_ENTETE.FO_ID = FOURNISSEURS.FO_ID
        LEFT JOIN dbo.COMMANDE_ENTETE ON MESSAGE_ENTETE.ME_ID = COMMANDE_ENTETE.ME_ID
        WHERE MESSAGE_ENTETE.CL_ID = 1260
        GROUP BY FO_RAISONSOC
        ORDER BY FO_RAISONSOC';

        dump($result);

        return $this->render('@AchatCentraleCrm/testView.html.twig');

    }


    public function testWithParamAction(Request $request, $id)
    {


        $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sql = "SELECT FO_RAISONSOC, COUNT(CE_ID) AS NB_CMD, COUNT(MESSAGE_ENTETE.ME_ID) AS NB_TICKETS
                FROM dbo.MESSAGE_ENTETE
                INNER JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS ON MESSAGE_ENTETE.FO_ID = FOURNISSEURS.FO_ID
                LEFT JOIN dbo.COMMANDE_ENTETE ON MESSAGE_ENTETE.ME_ID = COMMANDE_ENTETE.ME_ID
                WHERE MESSAGE_ENTETE.CL_ID = :id
                GROUP BY FO_RAISONSOC
                ORDER BY FO_RAISONSOC                  
        ";


        $stmt = $db2->prepare($sql);

        $stmt->bindValue("id", $id);
        $stmt->execute();






        return $this->render('@Site/test.html.twig', array(
            'panier' => $stmt->fetchAll()
        ));

    }


}
