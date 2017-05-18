<?php

namespace SiteBundle\Controller;


use  AchatCentrale\CrmBundle\Entity\ClientsTaches;
use SiteBundle\Form\ClientsTachesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{


    public function indexAuthAction(Request $request)
    {

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $user = $this->getUser();

        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy(
            [
                'usId' => $user->getUsId(),
                'claStatus' => 0
            ]
        );


        return $this->render(
            '@Site/Base/home.html.twig',
            [
                'task' => $task,
            ]
        );

    }

    public function ClientNewAction(Request $request)
    {

       if ($request->getMethod() == 'POST'){

           $req = $request->request->get('client-new');

           dump($req);

           $date_echeance = \DateTime::createFromFormat('d/mm/yy', $req['dtadh']);

           $client = new Clients();

           $client
               ->setClRef($req['ref'])
               ->setClRaisonsoc($req['raison-soc'])
               ->setClRaisonsoc($req['raison-soc'])
               ->setClSiret($req['siret'])
               ->setClAdresse1($req['adresse'])
               ->setClCp($req['cp'])
               ->setClCa($req['ca'])
               ->setClVille($req['ville'])
               ->setClPays($req['pays'])
               ->setClTel($req['tel'])
               ->setClMail($req['mail'])
               ->setClWeb($req['web'])
               ->setClTarif($req['tarif'])
               ->setClCodePromo($req['codePromo'])
               ->setClDtAdhesion($date_echeance)
               ->setClActivite($req['acti'])
               ->setClGroupe($req['groupe'])
               ->setClClassif($req['classif'])
               ->setClAdhesion($req['status'])

           ;


        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($client);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return $this->render('@Site/Base/client.new.html.twig', [
            'state' => 'Client enregistrer'
        ]);
       }






        $pays = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Pays')->findAll();
        $activité = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Activites')->findAll();
        $groupe = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Groupe')->findAll();
        $classif = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Classif')->findAll();
        $region = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Regions')->findAll();


        dump($region);

        return $this->render('@Site/Base/client.new.html.twig', [
            'pays' => $pays,
            'activite' => $activité,
            'groupe' => $groupe,
            'classif' => $classif,
            'region' => $region,
        ]);
    }


    public function ClientAction(Request $request)
    {


        $con = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $con->executeQuery(
            'SELECT DISTINCT
             SO_RAISONSOC,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
             CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION,
              GR_DESCR, CL_DESCR, AC_DESCR
              FROM Vue_All_Clients
              INNER JOIN SOCIETES ON Vue_All_Clients.SO_ID = SOCIETES.SO_ID
              ORDER BY SO_RAISONSOC DESC 
              '
        );
        $count = $stmt->fetchAll();

        return $this->render(
            '@Site/Base/client.html.twig',
            [
                "client" => $count,
            ]
        );

    }

    public function getAllClientsAction(Request $request)
    {
        $con = $this->get('database_connection');

        $sql = 'SELECT DISTINCT
                SO_ID,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION,
                CL_STATUS, CL_ADHESION, GR_DESCR, CL_DESCR, AC_DESCR


                FROM Vue_All_Clients

        ';


        $stmt = $con->prepare($sql);
        $stmt->execute();
        $count = $stmt->fetchAll();



        if ($request->query->get('query')) {
            $con = $this->getDoctrine()->getManager()->getConnection();

            $sql = 'SELECT DISTINCT
                SO_RAISONSOC,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION,
                CL_STATUS, CL_ADHESION, GR_DESCR, CL_DESCR, AC_DESCR
                
                FROM Vue_All_Clients
                
                INNER JOIN SOCIETES ON Vue_All_Clients.SO_ID = SOCIETES.SO_ID
                
                WHERE
                  CL_RAISONSOC LIKE :query
                OR CL_SIRET LIKE :query
                OR CL_CP LIKE :query
                OR CL_VILLE LIKE :query
                OR CL_PAYS LIKE :query
                OR CL_MAIL LIKE :query
                OR CL_WEB LIKE :query
                OR CL_ADHESION LIKE :query
                OR GR_DESCR LIKE :query
                OR CL_DESCR LIKE :query
                OR AC_DESCR LIKE :query
                OR CC_PRENOM LIKE :query
                OR CC_NOM LIKE :query
                OR CC_MAIL LIKE :query
              
                
                
                ';

            $stmt = $con->prepare($sql);
            $stmt->bindValue('query', '%'.$request->query->get('query').'%');
            $stmt->execute();
            $count = $stmt->fetchAll();


            return new JsonResponse($count, 200);

        }

        if ($request->query->get('centrale')) {


            $sqm = $this->get('site.service.client_services')->getTheSqlForCentrale($request->query->get('centrale'));

            $stmt = $con->prepare($sqm);
            $stmt->execute();
            $count = $stmt->fetchAll();



            return new JsonResponse($count, 200);

        }


        return new JsonResponse($count, 200);
    }

    public function ClientGeneralAction($id, $centrale)
    {


        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy(
            array('clId' => $id)
        );
        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy([
            'cl' => $id
        ]);

        $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy([
            'cl' => $id
        ]);



        dump($user);

        return $this->render(
            '@Site/Base/client.general.html.twig',
            [
                "client" => $restresult,
                "user" => $user,
                "tache" => $task,
            ]
        );

    }

    public function ClientAdresseAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(
            array(
                "clId" => $id,
            )
        );

        return $this->render(
            '@Site/Base/client.adresse.html.twig',
            [
                "client" => $restresult,
            ]
        );

    }

    public function ClientStatutAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(
            array(
                "clId" => $id,
            )
        );

        return $this->render(
            '@Site/Base/client.status.html.twig',
            [
                "client" => $restresult,
            ]
        );

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

        $client_info = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy(
            array('ccId' => $clientId)
        );

        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Vos codes pour la centrale')
            ->setFrom(array('contact@achatcentrale.fr' => "Votre centrale"))
            ->setTo('jb@achatcentrale.fr')
            ->setBody(
                $this->renderView(
                    'SiteBundle:mail:mailDetailClient.html.twig',
                    array(
                        'client' => $client_info,
                    )
                ),
                'text/html'
            );

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

        $con = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $con->executeQuery('SELECT * FROM Vue_All_Clients');
        $count = $stmt->fetchAll();

        dump($count);

        return $this->render(
            '@AchatCentraleCrm/testView.html.twig',
            [
                'count' => $count,
            ]
        );

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


        return $this->render(
            '@Site/test.html.twig',
            array(
                'panier' => $stmt->fetchAll(),
            )
        );

    }




}
