<?php

namespace SiteBundle\Controller;


use AchatCentrale\CrmBundle\Entity\ClientsNotes;
use DateTime;
use FunecapBundle\Entity\Clients;
use Http\Adapter\Guzzle6\Client;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Ivory\GoogleMap\Base\Coordinate;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\Overlay\Animation;
use Ivory\GoogleMap\Overlay\Icon;
use Ivory\GoogleMap\Overlay\Marker;
use Ivory\GoogleMap\Overlay\MarkerShape;
use Ivory\GoogleMap\Overlay\MarkerShapeType;
use Ivory\GoogleMap\Overlay\Symbol;
use Ivory\GoogleMap\Overlay\SymbolPath;
use Ivory\GoogleMap\Service\Geocoder\GeocoderService;
use Ivory\GoogleMap\Service\Geocoder\Request\GeocoderAddressRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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


        $Funecap = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Clients')->findAll();

        $rocEclerc = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findAll();



        $user = $this->getUser();

        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy(
            [
                'usId' => $user->getUsId(),


            ]
        );


        return $this->render(
            '@Site/Base/home.html.twig',
            [
                'task' => $task,
                'funecap' => $Funecap,
                'roc' => $rocEclerc,
            ]
        );

    }

    public function ClientNewAction(Request $request)
    {

        $emFunecap = $this->getDoctrine()->getManager('centrale_funecap_jb');

        $raison_soc = $request->query->get('raison-soc');
        $centrale_ID = $request->query->get('centrale');
        $centrale = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Societes')
            ->findBy([
                'soId' => $centrale_ID
            ]);


        switch ($centrale[0]->getSoRaisonsoc()) {
            case 'CENTRALE_ROC_ECLERC':
                $pays = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Activites')->findBy([
                    'soId' => $centrale_ID
                ]);
                $groupe = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_ACHAT_JB.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(year, +1, GETDATE())  )';


                    $db2 = $this->get('doctrine.dbal.centrale_funecap_jb_connection');


                    $stmt = $db2->prepare($sql_insert);

                    $stmt->bindValue("re", $req["region"], 'integer');
                    $stmt->bindValue("ref", $req["ref"], 'text');
                    $stmt->bindValue("raisonSoc", $req["raison-soc"], 'text');
                    $stmt->bindValue("siret", $req["siret"], 'text');
                    $stmt->bindValue("siret", str_replace(' ', '', $req["siret"]), 'text');
                    $stmt->bindValue("adresse", $req["adresse"], 'text');
                    $stmt->bindValue("cp", $req["cp"], 'text');
                    $stmt->bindValue("ville", $req["ville"], 'text');
                    $stmt->bindValue("pays", $req["pays"], 'text');
                    $stmt->bindValue("tel", str_replace(' ', '', $req["tel"]), 'text');
                    $stmt->bindValue("mail", $req["mail"], 'text');
                    $stmt->bindValue("web", $req["web"], 'text');
                    $stmt->bindValue("activite", $req["acti"], 'integer');
                    $stmt->bindValue("groupe", $req["groupe"], 'integer');
                    $stmt->bindValue("effectif", $req["effe"], 'integer');
                    $stmt->bindValue("classif", $req["classif"], 'integer');
                    $stmt->bindValue("ca", str_replace(' ', '', $req["ca"]), 'float');
                    $stmt->bindValue("status", $req["status"], 'text');
                    $stmt->bindValue("user", $this->getUser()->getusMail(), 'text');

                    $stmt->execute();


                    return $this->render('@Site/Base/client.new.html.twig', [
                        'idNew' => $db2->lastInsertId(),
                        'centrale_raison_soc' => $centrale[0]->getSoRaisonsoc(),
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                        'centrale' => $centrale,
                        'raisonSoc' => $raison_soc,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'raisonSoc' => $raison_soc,
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
            case 'CENTRALE_FUNECAP':

                $pays = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Activites')->findAll();
                $groupe = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {

                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_FUNECAP_JB.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(year, +1, GETDATE())  )';


                    $db2 = $this->get('doctrine.dbal.centrale_funecap_jb_connection');


                    $stmt = $db2->prepare($sql_insert);

                    $stmt->bindValue("re", $req["region"], 'integer');
                    $stmt->bindValue("ref", $req["ref"], 'text');
                    $stmt->bindValue("raisonSoc", $req["raison-soc"], 'text');
                    $stmt->bindValue("siret", $req["siret"], 'text');
                    $stmt->bindValue("siret", str_replace(' ', '', $req["siret"]), 'text');
                    $stmt->bindValue("adresse", $req["adresse"], 'text');
                    $stmt->bindValue("cp", $req["cp"], 'text');
                    $stmt->bindValue("ville", $req["ville"], 'text');
                    $stmt->bindValue("pays", $req["pays"], 'text');
                    $stmt->bindValue("tel", str_replace(' ', '', $req["tel"]), 'text');
                    $stmt->bindValue("mail", $req["mail"], 'text');
                    $stmt->bindValue("web", $req["web"], 'text');
                    $stmt->bindValue("activite", $req["acti"], 'integer');
                    $stmt->bindValue("groupe", $req["groupe"], 'integer');
                    $stmt->bindValue("effectif", $req["effe"], 'integer');
                    $stmt->bindValue("classif", $req["classif"], 'integer');
                    $stmt->bindValue("ca", str_replace(' ', '', $req["ca"]), 'float');
                    $stmt->bindValue("status", $req["status"], 'text');
                    $stmt->bindValue("user", $this->getUser()->getusMail(), 'text');

                    $stmt->execute();






                    return $this->render('@Site/Base/client.new.html.twig', [
                        'idNew' => $db2->lastInsertId(),
                        'centrale_raison_soc' => $centrale[0]->getSoRaisonsoc(),
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                        'centrale' => $centrale,
                        'raisonSoc' => $raison_soc,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'raisonSoc' => $raison_soc,
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
        }
    }

    public function ClientAction(Request $request)
    {


        $centrale = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Societes')->findAll();


        $con = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $con->executeQuery(
            'SELECT DISTINCT
             SO_RAISONSOC,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
             CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION,
              GR_DESCR, CL_DESCR, AC_DESCR, CL_TEL
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
                "centrale" => $centrale
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
            $stmt->bindValue('query', '%' . $request->query->get('query') . '%');
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


        $conn = $this->get('database_connection');

        switch ($centrale) {
            case "CENTRALE_FUNECAP":
                $restresult = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );


                $sql = 'SELECT *
                  FROM CENTRALE_FUNECAP_JB.dbo.CLIENTS_TACHES
                  WHERE CL_ID = :id';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:ClientsUsers')->findBy([
                        'cl' => $id
                    ]
                );

                $region = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Groupe')->findBy([
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:ClientsNotes')->findBy([
                    'cl' => $id,

                ]);


                return $this->render(
                    '@Site/Base/client.general.html.twig',
                    [
                        "client" => $restresult,
                        "user" => $user,
                        "tache" => $task,
                        "region" => $region,
                        "activite" => $activite,
                        "groupe" => $groupe,
                        "note" => $notes,
                        "centrale" => $centrale,
                    ]
                );
                break;
            case "CENTRALE_ROC_ECLERC":
                $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                FROM CLIENTS_TACHES
                  WHERE CL_ID = :id
                ORDER BY CLA_STATUS ASC';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy([
                    'cl' => $id
                ]);

                $region = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Groupe')->findBy([
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsNotes')->findBy([
                    'cl' => $id,

                ]);


                return $this->render(
                    '@Site/Base/client.general.html.twig',
                    [
                        "client" => $restresult,
                        "user" => $user,
                        "tache" => $task,
                        "region" => $region,
                        "activite" => $activite,
                        "groupe" => $groupe,
                        "note" => $notes,
                        "centrale" => $centrale,
                    ]
                );
                break;
            default:
                break;
        }

    }


    public function updateStatutAction($id, $centrale, Request $request)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientUtil = $this->get('site.service.client_services');


        $sql = "UPDATE CLIENTS
                SET
                  CL_STATUS = :status,
                  MAJ_DATE = GETUTCDATE()
                WHERE CL_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', $clientUtil->getTheIdForTheStatut($request->request->get('statut')));

        $stmt->execute();
        $result = $stmt->fetchAll();
        return new Response('Client numero :  ' . $id . ' modifié', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);






    }

    public function updateClientAction(Request $request, $id, $centrale)
    {


        $em = $this->getDoctrine()->getManager();


        $siret = $request->request->get('siret');
        $mail = $request->request->get('mail');
        $tel = $request->request->get('tel');
        $cp = $request->request->get('cp');
        $eff = $request->request->get('eff');
        $ca = $request->request->get('ca');
        $adresse = $request->request->get('adresse');
        $ville = $request->request->get('ville');


        $client = $em->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
            'clId' => $id
        ]);

        if (!$client) {
            throw $this->createNotFoundException(
                'Pas de client pour l\'id ' . $id
            );
        }

        $client[0]->setClSiret($siret);
        $client[0]->setClMail($mail);
        $client[0]->setClTel($tel);
        $client[0]->setClCp($cp);
        $client[0]->setClEffectif($eff);
        $client[0]->setClCa($ca);
        $client[0]->setClAdresse1($adresse);
        $client[0]->setClVille($ville);


        $em->flush();

        $res = "client mise à jour";


        return new JsonResponse($res, 200);
    }


    public function newNotesClientAction(Request $request, $id, $centrale)
    {

        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
            'clId' => $id

        ]);

        $content_notes = $request->request->get('content_note');
        $user = $this->getUser()->getusId();

        $notes = new ClientsNotes();

        $notes
            ->setCl($client[0])
            ->setCnNote($content_notes)
            ->getInsUser($user);

        $em->persist($notes);
        $em->flush();

        return new JsonResponse('Notes ajouté ', 200);
    }


    public function ClientAdresseAction($id)
    {

        $map = new Map();
        $geocoder = new GeocoderService(new Client(), new GuzzleMessageFactory());


        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(
            array(
                "clId" => $id,
            )
        );


        $request = new GeocoderAddressRequest($restresult['getCaAdresse1']);
        $response = $geocoder->geocode($request);


        foreach ($response->getResults() as $result) {


            $here = new Coordinate($result->getGeometry()->getLocation()->getLatitude(), $result->getGeometry()->getLocation()->getLongitude());


            $map->setAutoZoom(false);


            $map->setCenter($here);


            $map->setMapOption('zoom', 12);

            $marker = new Marker(
                new Coordinate(),
                Animation::BOUNCE,
                new Icon(),
                new Symbol(SymbolPath::CIRCLE),
                new MarkerShape(MarkerShapeType::CIRCLE, [1.1, 2.1, 1.4]),
                ['clickable' => false]
            );

            $marker->setVariable('marker');
            $marker->setAnimation(Animation::DROP);
            $marker->setIcon(new Icon());
            $marker->setSymbol(new Symbol(SymbolPath::CIRCLE));
            $marker->setShape(new MarkerShape(MarkerShapeType::CIRCLE, [1.1, 2.1, 1.4]));

            // TODO : mettre Marker sur l'adresse


            $map->getOverlayManager()->addMarker($marker);


        }

        $client = [];

        foreach ($restresult as $client) {

            if ($client->getCaType() === "F") {


            }

        }


        return $this->render(
            '@Site/Base/client.adresse.html.twig',
            [
                "client" => $restresult,
                "map" => $map

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

    public function testAction()
    {
        $clientUtil = $this->get('site.service.client_services');


        $statut = "Bloqué";





    }

    public function testWithParamAction(Request $request, $id)
    {


        $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sql = "SELECT *
FROM CLIENTS AS C

  JOIN CLIENTS_TACHES AS CT ON C.CL_ID = CT.CL_ID
  LEFT OUTER JOIN CLIENTS_NOTES AS CN ON C.CL_ID = CN.CL_ID
  LEFT OUTER JOIN MESSAGE_ENTETE AS ME ON C.CL_ID = ME.CL_ID
  LEFT OUTER JOIN MESSAGE_DETAIL AS MD ON ME.ME_ID = MD.ME_ID
WHERE C.CL_ID = :id
ORDER BY CT.INS_DATE, CN.INS_DATE, ME.INS_DATE ASC               
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
