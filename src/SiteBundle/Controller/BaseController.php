<?php

namespace SiteBundle\Controller;



use Goodby\CSV\Export\Standard\CsvFileObject;
use Goodby\CSV\Export\Standard\Exporter;
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
use Goodby\CSV\Export\Standard\ExporterConfig;
use Symfony\Component\HttpFoundation\StreamedResponse;


class BaseController extends Controller
{


    public function indexAuthAction(Request $request)
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $clientService = $this->get('site.service.client_services');
        $dataCount = $clientService->getTheCount();

        $user = $this->getUser();

        if($user->getUsId() === 2){


            $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

            $sql = "SELECT *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC";

            $stmt = $conn->prepare($sql);


            $stmt->execute();
            $task = $stmt->fetchAll();




            return $this->render(
                '@Site/Base/home.html.twig',
                [
                    'task' => $task,
                    "dataCount" => $dataCount

                ]
            );
        }

        $conn = $this->get('doctrine.dbal.centrale_gccp_connection');

        $sql = "SELECT *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE US_ID = :usId
                AND CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usId', $user->getUsId());


        $stmt->execute();
        $task = $stmt->fetchAll();




        return $this->render(
            '@Site/Base/home.html.twig',
            [
                'task' => $task,
                "dataCount" => $dataCount

            ]
        );

    }

    public function ClientNewAction(Request $request)
    {


        $conn = $this->get('database_connection');
        $centrale_ID = $request->query->get('centrale');




        switch ($centrale_ID) {
            case '1':

                $pays = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Activites')->findBy([
                    'soId' => $centrale_ID
                ]);
                $groupe = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';

                    $stmt = $conn->prepare($sql_insert);
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
                        'idNew' => $conn->lastInsertId(),
                        'centrale_raison_soc' => "ACHAT_CENTRALE",
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
            case '2':

                $pays = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Activites')->findBy([
                    'soId' => 1
                ]);
                $groupe = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_GCCP.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';

                    $stmt = $conn->prepare($sql_insert);
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
                    $stmt->bindValue("classif", 1, 'integer');
                    $stmt->bindValue("ca", str_replace(' ', '', $req["ca"]), 'float');
                    $stmt->bindValue("status", $req["status"], 'text');
                    $stmt->bindValue("user", $this->getUser()->getusMail(), 'text');

                    $stmt->execute();


                    return $this->render('@Site/Base/client.new.html.twig', [
                        'idNew' => $conn->lastInsertId(),
                        'centrale_raison_soc' => "CENTRALE_GCCP",
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
            case '4':
                $pays = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Activites')->findBy([
                    'soId' => 1
                ]);
                $groupe = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_FUNECAP.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';

                    $stmt = $conn->prepare($sql_insert);
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
                        'idNew' => $conn->lastInsertId(),
                        'centrale_raison_soc' => "CENTRALE_FUNECAP",
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
            case '5':
                $pays = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Activites')->findBy([
                    'soId' => 1
                ]);
                $groupe = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_PFPL.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';

                    $stmt = $conn->prepare($sql_insert);
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
                        'idNew' => $conn->lastInsertId(),
                        'centrale_raison_soc' => "CENTRALE_PFPL",
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
                    'pays' => $pays,
                    'activite' => $activite,
                    'groupe' => $groupe,
                    'classif' => $classif,
                    'region' => $region,
                ]);
                break;
            case '6':
                $pays = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Pays')->findAll();
                $activite = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Activites')->findBy([
                    'soId' => 1
                ]);
                $groupe = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Groupe')->findAll();
                $classif = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Classif')->findAll();
                $region = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Regions')->findAll();


                if ($request->getMethod() == 'POST') {
                    $req = $request->request->get('client-new');


                    $sql_insert = 'INSERT INTO CENTRALE_ROC_ECLERC.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC, CL_SIRET, CL_ADRESSE1, CL_CP,CL_CLASSIF, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_STATUS, CL_ADHESION, CL_ACTIVITE, CL_GROUPE, CL_EFFECTIF, CL_CA,INS_DATE, INS_USER, CL_DT_ADHESION)
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';

                    $stmt = $conn->prepare($sql_insert);
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
                        'idNew' => $conn->lastInsertId(),
                        'centrale_raison_soc' => "ROC_ECLERC",
                        'state' => 'Client enregistrer',
                        'pays' => $pays,
                        'activite' => $activite,
                        'groupe' => $groupe,
                        'classif' => $classif,
                        'region' => $region,
                    ]);
                }


                return $this->render('@Site/Base/client.new.html.twig', [
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




        $userChoice = $request->query->get('c');
        $centrale = $this->get('site.service.client_services')->getTheCentrale($userChoice);




       switch ($userChoice){

           case "all":
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   'SELECT DISTINCT
             SO_RAISONSOC,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
             CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION,
              GR_DESCR, AC_DESCR, CL_TEL
              FROM CENTRALE_ACHAT.dbo.Vue_All_Clients
              INNER JOIN CENTRALE_ACHAT.dbo.SOCIETES ON Vue_All_Clients.SO_ID = SOCIETES.SO_ID
              ORDER BY SO_RAISONSOC DESC 
              '
               );


               $result = $stmt->fetchAll();
               break;
           case 'roc':
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   '
                  SELECT DISTINCT
                  CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
                  CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
                  FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
                  ORDER BY INS_DATE DESC 
              '
               );
               $result = $stmt->fetchAll();
               break;
           case 'fun':
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_FUNECAP.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
               );
               $result = $stmt->fetchAll();


               break;
           case 'gccp':
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_GCCP.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
               );
               $result = $stmt->fetchAll();
               break;
           case 'pfpl':
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_PFPL.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
               );
               $result = $stmt->fetchAll();
               break;
           case 'ac':
               $con = $this->getDoctrine()->getManager()->getConnection();
               $stmt = $con->executeQuery(
                   'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_ACHAT.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
               );
               $result = $stmt->fetchAll();
           break;


       }
        return $this->render(
            '@Site/Base/client.html.twig',
            [
                "client" => $result,
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

            case "ACHAT_CENTRALE":


                $restresult = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                        FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                       WHERE CL_ID = :id
                      AND CLA_STATUS <> 10
                      ORDER BY CLA_STATUS ASC
                        ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ClientsUsers')->findBy([
                        'cl' => $id
                    ]
                );

                $region = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Groupe')->findBy([
                    'grId' => $restresult[0]->getClGroupe()
                ]);




                $notes = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ClientsNotes')->findBy([
                    'clId' => $id,
                ], [
                    'insDate' => 'DESC'
                ]);
                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ProfilsUsers')->findAll();


                $tacheArchive = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ClientsTaches')->findBy([
                        'clId' => $id,
                        'claStatus' => 10
                    ]
                );


                $sqlForTag = 'SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC';

                $stmtForTag = $conn->prepare($sqlForTag);
                $stmtForTag->bindValue('id', $id);
                $stmtForTag->execute();
                $tag = $stmtForTag->fetchAll();




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
                        "centrale_link" => "achatcentrale",
                        "fonction" => $fonction,
                        "profil" => $profil,
                        "tacheArchiv" => $tacheArchive,
                        "tag" => $tag

                    ]
                );



                break;
            case "CENTRALE_FUNECAP":
                $restresult = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                  FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                  WHERE CL_ID = :id
                  AND CLA_STATUS <> 10
                  ORDER BY CLA_STATUS ASC
                  ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsUsers')->findBy([
                        'cl' => $id
                    ]
                );

                $region = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Groupe')->findBy([
                    'grId' => $restresult[0]->getClGroupe()
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'ASC'
                ]);
                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ProfilsUsers')->findAll();


                $tacheArchive = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsTaches')->findBy([
                        'clId' => $id,
                        'claStatus' => 10
                    ]
                );



                $sqlForTag = 'SELECT * FROM CENTRALE_FUNECAP.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC';

                $stmtForTag = $conn->prepare($sqlForTag);
                $stmtForTag->bindValue('id', $id);
                $stmtForTag->execute();
                $tag = $stmtForTag->fetchAll();


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
                        "centrale_link" => "centrale-funecap",
                        "fonction" => $fonction,
                        "profil" => $profil,
                        "tacheArchiv" => $tacheArchive,
                        "tag" => $tag


                    ]
                );
                break;
            case "ROC_ECLERC":
                $restresult = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                  WHERE CL_ID = :id
                AND CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC
                ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsUsers')->findBy([
                    'cl' => $id
                ]);

                $region = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Groupe')->findBy([
                    'grId' => $restresult[0]->getClGroupe()
                ]);


                $notes = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ProfilsUsers')->findAll();

                $tacheArchive = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsTaches')->findBy([
                        'clId' => $id,
                        'claStatus' => 10
                    ]
                );

                $sqlForTag = 'SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC';

                $stmtForTag = $conn->prepare($sqlForTag);
                $stmtForTag->bindValue('id', $id);
                $stmtForTag->execute();
                $tag = $stmtForTag->fetchAll();


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
                        "centrale_link" => "centrale-roc-eclerc",
                        "fonction" => $fonction,
                        "profil" => $profil,
                        "tacheArchiv" => $tacheArchive,
                        "tag" => $tag

                    ]
                );
                break;
            case "CENTRALE_GCCP":
                $restresult = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES
                  WHERE CL_ID = :id
                  AND CLA_STATUS <> 10

                ORDER BY CLA_STATUS ASC
                ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsUsers')->findBy([
                    'cl' => $id
                ]);

                $region = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Regions')->findBy([
                    'reId' => $restresult[0]->getReId(),
                ]);

                $activite = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Activites')->findBy([
                    'acId' => $restresult[0]->getClActivite(),
                ]);

                $groupe = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Groupe')->findBy([
                    'grId' => $restresult[0]->getClGroupe()
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ProfilsUsers')->findAll();



                $tacheArchive = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsTaches')->findBy([
                        'clId' => $id,
                        'claStatus' => 10
                    ]
                );

                $sqlForTag = 'SELECT * FROM CENTRALE_GCCP.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC';

                $stmtForTag = $conn->prepare($sqlForTag);
                $stmtForTag->bindValue('id', $id);
                $stmtForTag->execute();
                $tag = $stmtForTag->fetchAll();



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
                        "centrale_link" => "centrale-gccp",
                        "fonction" => $fonction,
                        "profil" => $profil,
                        "tacheArchiv" => $tacheArchive,
                        "tag" => $tag

                    ]
                );
                break;
            case "CENTRALE_PFPL":
                $restresult = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findBy([
                        'clId' => $id
                    ]
                );

                $sql = 'SELECT *
                FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES
                  WHERE CL_ID = :id
                AND CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC
                ';

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();

                $task = $stmt->fetchAll();


                $user = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsUsers')->findBy([
                    'cl' => $id
                ]);

                $region = "Aucne région pour le moment";

                $activite = "Aucune activité pour le moment";

                $groupe = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Groupe')->findBy([
                    'grId' => $restresult[0]->getClGroupe()
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ProfilsUsers')->findAll();



                $tacheArchive = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsTaches')->findBy([
                        'clId' => $id,
                        'claStatus' => 10
                    ]
                );

                $sqlForTag = 'SELECT * FROM CENTRALE_PFPL.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC';

                $stmtForTag = $conn->prepare($sqlForTag);
                $stmtForTag->bindValue('id', $id);
                $stmtForTag->execute();
                $tag = $stmtForTag->fetchAll();


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
                        "centrale_link" => "centrale-pfpl",
                        "fonction" => $fonction,
                        "profil" => $profil,
                        "tacheArchiv" => $tacheArchive,
                        "tag" => $tag

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

        switch ($centrale) {
            case "CENTRALE_FUNECAP":
                $em = $this->getDoctrine()->getManager('centrale_funecap');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('FunecapBundle:Clients')->findBy([
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

                break;
            case "ROC_ECLERC":
                $em = $this->getDoctrine()->getManager('roc_eclerc');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('RocEclercBundle:Clients')->findBy([
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
                break;
            case "CENTRALE_PFPL":
                $em = $this->getDoctrine()->getManager('centrale_pascal_leclerc');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('PfplBundle:Clients')->findBy([
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
                break;
            case "CENTRALE_GCCP":
                $em = $this->getDoctrine()->getManager('centrale_gccp');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('GccpBundle:Clients')->findBy([
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
                break;
            case "ACHAT_CENTRALE":
                $em = $this->getDoctrine()->getManager('achat_centrale');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('AchatCentraleBundle:Clients')->findBy([
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
                break;

            default:
                break;
        }
        $res = "Aucun client mise a jour";

        return new JsonResponse($res, 200);


    }

    public function updateClientUserAction(Request $request, $id, $centrale, $idUser)
    {

        switch ($centrale) {
            case "CENTRALE_FUNECAP":
                $fct = $request->request->get('fct');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $nom = $request->request->get('nom');
                $prenom = $request->request->get('prenom');
                $pass = $request->request->get('pass');



                $conn = $this->get('database_connection');
                $sql = 'UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_USERS
                    SET CC_FONCTION = :fct, CC_MAIL = :mail, CC_TEL = :tel, CC_PASS = :pass, CC_PRENOM = :prenom, CC_NOM = :nom 
                    WHERE CC_ID = :id';

                $stmt = $conn->prepare($sql);



                $stmt->bindValue("fct", $fct,  'integer');
                $stmt->bindValue("mail", $mail, 'text');
                $stmt->bindValue("tel", $tel, 'integer');
                $stmt->bindValue("nom", $nom, 'text');
                $stmt->bindValue("prenom", $prenom, 'text');
                $stmt->bindValue("pass", $pass, 'text');
                $stmt->bindValue("id", $id);


                $result = $stmt->execute();


                return new JsonResponse($result, 200);

                break;
            case "ROC_ECLERC":
                $em = $this->getDoctrine()->getManager('roc_eclerc');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('RocEclercBundle:Clients')->findBy([
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
                break;
            case "CENTRALE_PFPL":
                $em = $this->getDoctrine()->getManager('centrale_pascal_leclerc');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('PfplBundle:Clients')->findBy([
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
                break;
            case "CENTRALE_GCCP":
                $em = $this->getDoctrine()->getManager('centrale_gccp');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('GccpBundle:Clients')->findBy([
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
                break;
            case "ACHAT_CENTRALE":
                $em = $this->getDoctrine()->getManager('achat_centrale');
                $siret = $request->request->get('siret');
                $mail = $request->request->get('mail');
                $tel = $request->request->get('tel');
                $cp = $request->request->get('cp');
                $eff = $request->request->get('eff');
                $ca = $request->request->get('ca');
                $adresse = $request->request->get('adresse');
                $ville = $request->request->get('ville');
                $client = $em->getRepository('AchatCentraleBundle:Clients')->findBy([
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
                break;

            default:
                break;
        }
        $res = "Aucun client mise a jour";

        return new JsonResponse($res, 200);



        return $this->render('@Site/test.html.twig');

    }

    public function newNotesClientAction(Request $request, $id, $centrale)
    {

        $em = $this->getDoctrine()->getManager();


        switch ($centrale){
            case"ACHAT_CENTRALE":
                $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $content_notes = $request->request->get('content_note');
                $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)";
                $stmt = $db2->prepare($sql);
                $stmt->bindValue("id", $id);
                $stmt->bindValue("content", $content_notes);
                $stmt->bindValue("user", $this->getUser()->getUsId());
                $stmt->execute();
                return new JsonResponse('Notes ajouté ', 200);
                break;
            case"ROC_ECLERC":
                $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $content_notes = $request->request->get('content_note');
                $sql = "INSERT INTO CENTRALE_ROC_ECLERC.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)";
                $stmt = $db2->prepare($sql);
                $stmt->bindValue("id", $id);
                $stmt->bindValue("content", $content_notes);
                $stmt->bindValue("user", $this->getUser()->getUsId());
                $stmt->execute();
                return new JsonResponse('Notes ajouté ', 200);
                break;
            case"CENTRALE_PFPL":
                $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $content_notes = $request->request->get('content_note');
                $sql = "INSERT INTO CENTRALE_PFPL.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)";
                $stmt = $db2->prepare($sql);
                $stmt->bindValue("id", $id);
                $stmt->bindValue("content", $content_notes);
                $stmt->bindValue("user", $this->getUser()->getUsId());
                $stmt->execute();
                return new JsonResponse('Notes ajouté ', 200);
                break;
            case"CENTRALE_GCCP":
                $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $content_notes = $request->request->get('content_note');
                $sql = "INSERT INTO CENTRALE_GCCP.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)";
                $stmt = $db2->prepare($sql);
                $stmt->bindValue("id", $id);
                $stmt->bindValue("content", $content_notes);
                $stmt->bindValue("user", $this->getUser()->getUsId());
                $stmt->execute();
                return new JsonResponse('Notes ajouté ', 200);
                break;
            case"CENTRALE_FUNECAP":
                $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $content_notes = $request->request->get('content_note');
                $sql = "INSERT INTO CENTRALE_FUNECAP.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)";
                $stmt = $db2->prepare($sql);
                $stmt->bindValue("id", $id);
                $stmt->bindValue("content", $content_notes);
                $stmt->bindValue("user", $this->getUser()->getUsId());
                $stmt->execute();
                return new JsonResponse('Notes ajouté ', 200);
                break;
        }




    }

    public function newClientsUserAction(Request $request, $id, $centrale)
    {


        switch ($centrale) {
            case 'ROC_ECLERC':

                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $conn = $this->get('doctrine.dbal.centrale_pascal_leclerc_connection');

                $sql = "INSERT INTO CENTRALE_ROC_ECLERC.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':cl', $id);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':validation',$CCvalidation );
                $stmt->bindValue(':status',$profil );
                $stmt->bindValue(':user', $this->getUser()->getUsMail() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200);
                break;
            case 'CENTRALE_FUNECAP':



                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $conn = $this->get('doctrine.dbal.centrale_pascal_leclerc_connection');

                $sql = "INSERT INTO CENTRALE_FUNECAP.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':cl', $id);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':validation',$CCvalidation );
                $stmt->bindValue(':status',$profil );
                $stmt->bindValue(':user', $this->getUser()->getUsMail() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200);
                break;
            case 'CENTRALE_GCCP':
                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $conn = $this->get('doctrine.dbal.centrale_pascal_leclerc_connection');

                $sql = "INSERT INTO CENTRALE_GCCP.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':cl', $id);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':validation',$CCvalidation );
                $stmt->bindValue(':status',$profil );
                $stmt->bindValue(':user', $this->getUser()->getUsMail() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200);
                break;
            case 'CENTRALE_PFPL':
                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $conn = $this->get('doctrine.dbal.centrale_pascal_leclerc_connection');

                $sql = "INSERT INTO CENTRALE_PFPL.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':cl', $id);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':validation',$CCvalidation );
                $stmt->bindValue(':status',$profil );
                $stmt->bindValue(':user', $this->getUser()->getUsMail() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200);
                break;
            case 'ACHAT_CENTRALE':
                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $conn = $this->get('doctrine.dbal.centrale_pascal_leclerc_connection');

                $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER, PU_ID)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, 0, GETDATE(), :user, :profil)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':cl', $id);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':profil', $profil);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':validation',$CCvalidation );
                $stmt->bindValue(':user', $this->getUser()->getUsMail() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200);
                break;

        }

    }

    public function ClientAdresseAction($id, $centrale, Request $request)
    {


        switch ($centrale) {
            case "CENTRALE_FUNECAP":

                $restresult = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:ClientsAdresses')->findBy([
                        'clId' => $id
                    ]
                );


                foreach ($restresult as &$adresse) {
                    if ($adresse->getCaType() === "L") {

                        $mapF = new Map();
                        $geocoder = new GeocoderService(new Client(), new GuzzleMessageFactory());


                        $request = new GeocoderAddressRequest($restresult[0]->getCaAdresse1() . " " .$restresult[0]->getCaCp() . " " .$restresult[0]->getCaVille() );
                        $response = $geocoder->geocode($request);
                        foreach ($response->getResults() as $result) {
                            $here = new Coordinate($result->getGeometry()->getLocation()->getLatitude(), $result->getGeometry()->getLocation()->getLongitude());
                            $mapF->setAutoZoom(false);
                            $mapF->setCenter($here);
                            $mapF->setMapOption('zoom', 12);




                            $marker = new Marker(
                                new Coordinate($here->getLatitude(), $here->getLatitude()),
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
                            $mapF->getOverlayManager()->addMarker($marker);
                        }


                    } elseif ($adresse->getCaType() === "F") {
                        return 0;
                    }
                }




                return $this->render(
                    '@Site/Base/client.adresse.html.twig',
                    [
                        "client" => $restresult,
                        "mapF" => $mapF

                    ]
                );

                break;
            case "CENTRALE_ROC_ECLERC":
                $restresult = $this->getDoctrine()->getManager()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy([
                        'clId' => $id
                    ]
                );




                $mapF = new Map();
                $mapL = new Map();
                $geocoder = new GeocoderService(new Client(), new GuzzleMessageFactory());



                foreach ($restresult as &$adresse) {
                    if ($adresse->getCaType() === "L") {




                        $request = new GeocoderAddressRequest($restresult[0]->getCaAdresse1() . " " .$restresult[0]->getCaCp() . " " .$restresult[0]->getCaVille() );
                        $response = $geocoder->geocode($request);


                        foreach ($response->getResults() as $result) {
                            $here = new Coordinate($result->getGeometry()->getLocation()->getLatitude(), $result->getGeometry()->getLocation()->getLongitude());
                            $mapF->setAutoZoom(false);
                            $mapF->setCenter($here);
                            $mapF->setMapOption('zoom', 12);




                            $marker = new Marker(
                                new Coordinate($here->getLatitude(), $here->getLatitude()),
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
                            $mapF->getOverlayManager()->addMarker($marker);
                        }


                    } elseif ($adresse->getCaType() === "F") {



                        $request = new GeocoderAddressRequest($restresult[0]->getCaAdresse1() . " " .$restresult[0]->getCaCp() . " " .$restresult[0]->getCaVille() );
                        $response = $geocoder->geocode($request);


                        foreach ($response->getResults() as $result) {
                            $here = new Coordinate($result->getGeometry()->getLocation()->getLatitude(), $result->getGeometry()->getLocation()->getLongitude());
                            $mapL->setAutoZoom(false);
                            $mapL->setCenter($here);
                            $mapL->setMapOption('zoom', 12);




                            $marker = new Marker(
                                new Coordinate($here->getLatitude(), $here->getLatitude()),
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
                            $mapL->getOverlayManager()->addMarker($marker);
                        }
                    }
                }


                return $this->render(
                    '@Site/Base/client.adresse.html.twig',
                    [
                        "client" => $restresult,
                        "mapF" => $mapF,
                        "mapL" => $mapL

                    ]
                );
                break;
            default:
                break;
        }


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

    public function ClientFacturationAction(Request $request, $id, $centrale)
    {

        switch ($centrale) {
            case "CENTRALE_FUNECAP":
                $restresult = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findBy(['clId' => $id]);
                return $this->render(
                    '@Site/Base/client.facturation.html.twig',
                    [
                        "client" => $restresult,
                        "centrale" => $centrale,
                    ]
                );
                break;
            case "ROC_ECLERC":
                $restresult = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findBy([
                        'clId' => $id
                    ]);
                $contrat = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Contrats')->findBy([
                    'cl' => $id
                ]);
                return $this->render(
                    '@Site/Base/client.facturation.html.twig',
                    [
                        "client" => $restresult,
                        "centrale" => $centrale,
                        "contrat" => $contrat
                    ]
                );
                break;
            case 'CENTRALE_PFPL':
                $restresult = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findBy([ 'clId' => $id ]);
                $contrat = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Contrats')->findBy([ 'cl' => $id ]);

                return $this->render(
                    '@Site/Base/client.facturation.html.twig',
                    [
                        "client" => $restresult,
                        "centrale" => $centrale,
                        "contrat" => $contrat
                    ]
                );
                break;
            case "CENTRALE_GCCP":
                $restresult = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findBy([ 'clId' => $id ]);
                $contrat = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Contrats')->findBy([ 'clId' => $id ]);
                return $this->render(
                    '@Site/Base/client.facturation.html.twig',
                    [
                        "client" => $restresult,
                        "centrale" => $centrale,
                        "contrat" => $contrat
                    ]
                );
                break;
            case "ACHAT_CENTRALE":
                $restresult = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findBy([ 'clId' => $id ]);
                $contrat = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Contrats')->findBy([ 'cl' => $id ]);


                return $this->render(
                    '@Site/Base/client.facturation.html.twig',
                    [
                        "client" => $restresult,
                        "centrale" => $centrale,
                        "contrat" => $contrat
                    ]
                );
                break;
            default:
                break;
        }


    }

    public function ClientFeedAction($id, $centrale)
    {

        $feed = $this->get('site.service.feed_services');


        $feed->getTheLast($id, $centrale);


        $feed->showTheFeed();

        return $this->render('@Site/ui-element/feed.list.html.twig', [
            'feed' => $feed,
            'centrale' => $centrale,
            'id' => $id,
        ]);


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
                    'SiteBundle:mail:RelanceTaskNotification.html.twig',
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

    public function getClientRaisonSocAction(Request $request, $id, $centrale)
    {



        switch ($centrale){

            case 1:
                $client = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findBy([
                    'clId' => $id
                ]);
                return new Response($client[0]->getClRaisonsoc(), 200);
            case 2:
                $client = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findBy([
                    'clId' => $id
                ]);
                return new Response($client[0]->getClRaisonsoc(), 200);
            case 4:
                $client = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findBy([
                    'clId' => $id
                ]);
                return new Response($client[0]->getClRaisonsoc(), 200);
            case 5:
                $client = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findBy([
                    'clId' => $id
                ]);
                return new Response($client[0]->getClRaisonsoc(), 200);
            case 6:
                $client = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findBy([
                    'clId' => $id
                ]);
                return new Response($client[0]->getClRaisonsoc(), 200);

        }


        return $this->render('@Site/ui-element/taches/action.client-raisonSoc.html.twig');

    }

    public function testAction()
    {
        $mailer = $this->get('site.service.mailer');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $sql = "SELECT
                      *
                    FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                      INNER JOIN CENTRALE_ACHAT.dbo.USERS ON USERS.US_ID = Vue_All_Taches.US_ID
                    WHERE Vue_All_Taches.CLA_STATUS = 0
                    AND Vue_All_Taches.INS_DATE < GETDATE() - 3";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $task = $stmt->fetchAll();

        foreach ($task as $t) {

            $result = $mailer->sendRelanceTaskNotification($t['US_MAIL'], $t['CLA_NOM'], $t['CLA_DESCR'],$t['INS_DATE'], $t['CLA_ECHEANCE'], $t['US_NOM'], $t['US_PRENOM']  );



        }

        return $this->render('@Site/test.html.twig');


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

    public function getUserAutocompleteAction(Request $request, $query)
    {

        $conn = $this->get('database_connection');


        $sql = 'SELECT *
                FROM CENTRALE_ACHAT.dbo.USERS
                WHERE US_PRENOM LIKE :query
                  ';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('query', '%'.$query.'%');
        $stmt->execute();

        $users = $stmt->fetchAll();

        $result = [
            "total_count" => count($users),
            "incomplete_results" => false,
            "items" => $users
        ];

        return new JsonResponse($result, 200);
    }

    public function getClientAutocompleteAction(Request $request, $query,$centrale)
    {



        $conn = $this->get('database_connection');

        $clientService = $this->get('site.service.client_services');

        switch ($centrale){
            case 'pfpl':
                $sql = "SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM CENTRALE_PFPL.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query
                  ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('query', '%'.$query.'%');
                $stmt->execute();

                $clients = $stmt->fetchAll();
                $result = $clientService->array_utf8_encode($clients);

                $result = [
                    "total_count" => count($clients),
                    "incomplete_results" => false,
                    "items" => $result
                ];

                return new JsonResponse($result, 200);
            case 'roc':
                $sql = "SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query
                  ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('query', '%'.$query.'%');
                $stmt->execute();

                $clients = $stmt->fetchAll();
                $result = $clientService->array_utf8_encode($clients);

                $result = [
                    "total_count" => count($clients),
                    "incomplete_results" => false,
                    "items" => $result
                ];

                return new JsonResponse($result, 200);
            case 'funecap':
                $sql = "SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM CENTRALE_FUNECAP.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query
                  ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('query', '%'.$query.'%');
                $stmt->execute();

                $clients = $stmt->fetchAll();
                $result = $clientService->array_utf8_encode($clients);

                $result = [
                    "total_count" => count($clients),
                    "incomplete_results" => false,
                    "items" => $result
                ];

                return new JsonResponse($result, 200);
            case 'ac' :
                $sql = "SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM CENTRALE_ACHAT.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query
                  ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('query', '%'.$query.'%');
                $stmt->execute();

                $clients = $stmt->fetchAll();
                $result = $clientService->array_utf8_encode($clients);

                $result = [
                    "total_count" => count($clients),
                    "incomplete_results" => false,
                    "items" => $result
                ];

                return new JsonResponse($result, 200);
            case 'gccp' :
                $sql = "SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM CENTRALE_GCCP.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query
                  ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('query', '%'.$query.'%');
                $stmt->execute();

                $clients = $stmt->fetchAll();
                $result = $clientService->array_utf8_encode($clients);

                $result = [
                    "total_count" => count($clients),
                    "incomplete_results" => false,
                    "items" => $result
                ];

                return new JsonResponse($result, 200);
        }

    }

    public function getClientUserAction(Request $request, $id, $centrale){

        $conn = $this->get('database_connection');
        $clientService = $this->get('site.service.client_services');


        switch ($centrale)
        {
            case 'CENTRALE_FUNECAP':


                $sql = "SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM CENTRALE_FUNECAP.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id";


                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $ccUser = $stmt->fetchAll();

                $clientService->array_utf8_encode($ccUser);
                return new JsonResponse($ccUser, 200);
                break;
            case 'CENTRALE_GCCP':
                $sql = "SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM CENTRALE_GCCP.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id";


                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $ccUser = $stmt->fetchAll();

                $clientService->array_utf8_encode($ccUser);
                return new JsonResponse($ccUser, 200);
            case 'ROC_ECLERC':
                $sql = "SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $ccUser = $stmt->fetchAll();

                $clientService->array_utf8_encode($ccUser);
                return new JsonResponse($ccUser, 200);
                break;
            case 'CENTRALE_PFPL':
                $sql = "SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM CENTRALE_PFPL.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id";


                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $ccUser = $stmt->fetchAll();

                $clientService->array_utf8_encode($ccUser);
                return new JsonResponse($ccUser, 200);
                break;
            case 'ACHAT_CENTRALE' :
                $sql = "SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM CENTRALE_ACHAT.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id";


                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $ccUser = $stmt->fetchAll();

                $clientService->array_utf8_encode($ccUser);
                return new JsonResponse($ccUser, 200);
                break;
        }



    }

    public function getClientLabelAction(Request$request, $id, $centrale){

        $conn = $this->get('database_connection');


        switch ($centrale){

            case "funecap":
                $sql = "SELECT * FROM CENTRALE_FUNECAP.dbo.CLIENTS WHERE CL_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $data = [
                    "raisonSoc" => $result[0]['CL_RAISONSOC']
                ];

                return new JsonResponse($data, 200);
                break;
            case "pfpl" :
                $sql = "SELECT * FROM CENTRALE_PFPL.dbo.CLIENTS WHERE CL_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $data = [
                    "raisonSoc" => $result[0]['CL_RAISONSOC']
                ];

                return new JsonResponse($data, 200);
                break;
            case "roc" :
                $sql = "SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS WHERE CL_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $data = [
                    "raisonSoc" => $result[0]['CL_RAISONSOC']
                ];

                return new JsonResponse($data, 200);
                break;
            case "ac":
                $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS WHERE CL_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $data = [
                    "raisonSoc" => $result[0]['CL_RAISONSOC']
                ];

                return new JsonResponse($data, 200);
                break;
            case "gccp" :
                $sql = "SELECT * FROM CENTRALE_GCCP.dbo.CLIENTS WHERE CL_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $data = [
                    "raisonSoc" => $result[0]['CL_RAISONSOC']
                ];

                return new JsonResponse($data, 200);
                break;

        }






    }

    public function exportClientAction(Request $request, $centrale)
    {
        $conn = $this->get('database_connection');


        switch ($centrale) {
            case 'roc':
                $stmt = $conn->prepare('SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS');
                $stmt->execute();
                $response = new StreamedResponse();
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'text/csv');
                $response->setCallback(function () use ($stmt) {
                    $config = new ExporterConfig();
                    $config
                        ->setDelimiter(";")
                        ->setFileMode(CsvFileObject::FILE_MODE_WRITE) // Customize file mode and choose either write or append. Default value is write ('w'). See fopen() php docs
                    ;
                    $exporter = new Exporter($config);
                    $exporter->export('php://output', $stmt->fetchAll());
                });
                $response->send();
                return $response;
                break;
            case 'fun':
                $stmt = $conn->prepare('SELECT * FROM CENTRALE_FUNECAP.dbo.CLIENTS');
                $stmt->execute();
                $response = new StreamedResponse();
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'text/csv');
                $response->setCallback(function () use ($stmt) {
                    $config = new ExporterConfig();
                    $config
                        ->setDelimiter(";")
                        ->setFileMode(CsvFileObject::FILE_MODE_WRITE) // Customize file mode and choose either write or append. Default value is write ('w'). See fopen() php docs
                    ;
                    $exporter = new Exporter($config);
                    $exporter->export('php://output', $stmt->fetchAll());
                });
                $response->send();
                return $response;
                break;
            case 'ac':
                $conn = $this->get('database_connection');
                $stmt = $conn->prepare('SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS');
                $stmt->execute();
                $response = new StreamedResponse();
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'text/csv');
                $response->setCallback(function () use ($stmt) {
                    $config = new ExporterConfig();
                    $config
                        ->setDelimiter(";")
                        ->setFileMode(CsvFileObject::FILE_MODE_WRITE) // Customize file mode and choose either write or append. Default value is write ('w'). See fopen() php docs
                    ;
                    $exporter = new Exporter($config);
                    $exporter->export('php://output', $stmt->fetchAll());
                });
                $response->send();
                return $response;
                break;
            case 'gccp':
                $conn = $this->get('database_connection');
                $stmt = $conn->prepare('SELECT * FROM CENTRALE_GCCP.dbo.CLIENTS');
                $stmt->execute();
                $response = new StreamedResponse();
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'text/csv');
                $response->setCallback(function () use ($stmt) {
                    $config = new ExporterConfig();
                    $config
                        ->setDelimiter(";")
                        ->setFileMode(CsvFileObject::FILE_MODE_WRITE) // Customize file mode and choose either write or append. Default value is write ('w'). See fopen() php docs
                    ;
                    $exporter = new Exporter($config);
                    $exporter->export('php://output', $stmt->fetchAll());
                });
                $response->send();
                return $response;
                break;
            case 'pfpl':
                $conn = $this->get('database_connection');
                $stmt = $conn->prepare('SELECT * FROM CENTRALE_PFPL.dbo.CLIENTS');
                $stmt->execute();
                $response = new StreamedResponse();
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'text/csv');
                $response->setCallback(function () use ($stmt) {
                    $config = new ExporterConfig();
                    $config
                        ->setDelimiter(";")
                        ->setFileMode(CsvFileObject::FILE_MODE_WRITE) // Customize file mode and choose either write or append. Default value is write ('w'). See fopen() php docs
                    ;
                    $exporter = new Exporter($config);
                    $exporter->export('php://output', $stmt->fetchAll());
                });
                $response->send();
                return $response;
                break;


        }


    }

    public function newHastagAction(Request $request, $id, $centrale)
    {


        $message = $request->request->get('tag');
        $cl = $request->request->get('cl');




        switch ($centrale){

            case "ROC_ECLERC":
                $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

                $sql = "INSERT INTO CENTRALE_ROC_ECLERC.dbo.CLIENTS_TAG ( CL_ID, TAG, INS_DATE, INS_USER) VALUES (:cl, :tag, GETUTCDATE(), :user)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":cl", $id);
                $stmt->bindValue(":tag", $message);
                $stmt->bindValue(":user", $this->getUser()->getUsId());
                $stmt->execute();
                $task = $stmt->fetchAll();
                return new JsonResponse("Tag enregistrer", 200);
                break;
            case "CENTRALE_FUNECAP":
                $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

                $sql = "INSERT INTO CENTRALE_FUNECAP.dbo.CLIENTS_TAG ( CL_ID, TAG, INS_DATE, INS_USER) VALUES (:cl, :tag, GETUTCDATE(), :user)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":cl", $id);
                $stmt->bindValue(":tag", $message);
                $stmt->bindValue(":user", $this->getUser()->getUsId());
                $stmt->execute();
                $task = $stmt->fetchAll();
                return new JsonResponse("Tag enregistrer", 200);
                break;
            case "ACHAT_CENTRALE":
                $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

                $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_TAG ( CL_ID, TAG, INS_DATE, INS_USER) VALUES (:cl, :tag, GETUTCDATE(), :user)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":cl", $id);
                $stmt->bindValue(":tag", $message);
                $stmt->bindValue(":user", $this->getUser()->getUsId());
                $stmt->execute();
                $task = $stmt->fetchAll();
                return new JsonResponse("Tag enregistrer", 200);
                break;
            case "CENTRALE_PFPL":
                $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $sql = "INSERT INTO CENTRALE_PFPL.dbo.CLIENTS_TAG ( CL_ID, TAG, INS_DATE, INS_USER) VALUES (:cl, :tag, GETUTCDATE(), :user)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":cl", $id);
                $stmt->bindValue(":tag", $message);
                $stmt->bindValue(":user", $this->getUser()->getUsId());
                $stmt->execute();
                $task = $stmt->fetchAll();
                return new JsonResponse("Tag enregistrer", 200);
                break;
            case "CENTRALE_GCCP":
                $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
                $sql = "INSERT INTO CENTRALE_GCCP.dbo.CLIENTS_TAG ( CL_ID, TAG, INS_DATE, INS_USER) VALUES (:cl, :tag, GETUTCDATE(), :user)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(":cl", $id);
                $stmt->bindValue(":tag", $message);
                $stmt->bindValue(":user", $this->getUser()->getUsId());
                $stmt->execute();
                $task = $stmt->fetchAll();
                return new JsonResponse("Tag enregistrer", 200);
                break;

        }



    }

}


