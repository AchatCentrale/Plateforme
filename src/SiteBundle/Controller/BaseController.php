<?php

namespace SiteBundle\Controller;


use Goodby\CSV\Export\Standard\CsvFileObject;
use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;
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
use SiteBundle\Service\ClientServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        if ($user->getUsId() === 2 && $user->getUsId() === 5) {


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

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT TOP 5 *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE US_ID = :usId
                AND CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usId', $user->getUsId());
        $stmt->execute();
        $task = $stmt->fetchAll();


        $sqlNote = "SELECT TOP 5 *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Notes
                ORDER BY INS_DATE DESC
                ";

        $stmtNote = $conn->prepare($sqlNote);
        $stmtNote->execute();
        $notes = $stmtNote->fetchAll();


        $sqlAllClients = "SELECT DISTINCT *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Clients
                ";
        $stmtAllClients = $conn->prepare($sqlAllClients);
        $stmtAllClients->execute();
        $clients = $stmtAllClients->fetchAll();


        $sqlRdv = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                    WHERE CLA_TYPE = 5
                    AND US_ID = :id
                    ORDER BY INS_DATE DESC
                ";

        $stmtRdv = $conn->prepare($sqlRdv);
        $stmtRdv->bindValue(':id', $user->getUsId());
        $stmtRdv->execute();
        $rdv = $stmtRdv->fetchAll();


        return $this->render(
            '@Site/Base/home.html.twig',
            [
                'task' => $task,
                "dataCount" => $dataCount,
                "clients" => $clients,
                "note" => $notes,
                "rdv" => $rdv

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

        $conn = $this->get('database_connection');


        $sqlListeCentrale = "SELECT * FROM CENTRALE_ACHAT.dbo.SOCIETES WHERE SO_STATUS = 1";

        $stmtListeCentrale = $conn->prepare($sqlListeCentrale);
        $stmtListeCentrale->execute();
        $listeCentrale = $stmtListeCentrale->fetchAll();


        if ($userChoice == "all"){

            $sqlClient = "SELECT DISTINCT
             SO_RAISONSOC,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
             CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION,
              GR_DESCR, AC_DESCR, CL_TEL, GR_DESCR, Vue_All_Clients.SO_ID
              FROM CENTRALE_ACHAT.dbo.Vue_All_Clients
              INNER JOIN CENTRALE_ACHAT.dbo.SOCIETES ON Vue_All_Clients.SO_ID = SOCIETES.SO_ID
              ORDER BY SO_RAISONSOC DESC ";
            $stmt = $conn->prepare($sqlClient);
            $stmt->bindValue('so_id', $userChoice);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $this->render(
                '@Site/Base/client.html.twig',
                [
                    "client" => $result,
                    "centrale" => "All",
                    "listeCentrale" => $listeCentrale
                ]
            );


        } else {

            $sqlCentrale = "SELECT SO_DATABASE, SO_ID FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :so_id";
            $stmt = $conn->prepare($sqlCentrale);
            $stmt->bindValue('so_id', $userChoice);
            $stmt->execute();
            $so_database = $stmt->fetchAll();

            $sqlClient = sprintf("SELECT DISTINCT
                  CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
                  CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL, CL_GROUPE
                  FROM %s.dbo.CLIENTS
                  ORDER BY INS_DATE DESC", $so_database[0]["SO_DATABASE"]);
            $stmt = $conn->prepare($sqlClient);
            $stmt->bindValue('so_id', $userChoice);
            $stmt->execute();
            $result = $stmt->fetchAll();



            return $this->render(
                '@Site/Base/client.html.twig',
                [
                    "client" => $result,
                    "centrale" => $so_database[0]["SO_ID"],
                    "listeCentrale" => $listeCentrale

                ]
            );

        }






    }

    public function ClientGeneralAction($id, $centrale)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $sqlClient = sprintf("SELECT * FROM %s.dbo.CLIENTS WHERE CL_ID = :id", $so_database);

        $stmtClient = $conn->prepare($sqlClient);
        $stmtClient->bindValue('id', $id);
        $stmtClient->execute();
        $restresult = $stmtClient->fetchAll();



        $sql = sprintf('SELECT *
                FROM %s.dbo.CLIENTS_TACHES
                WHERE CL_ID = :id
                AND CLA_STATUS <> 10
                ORDER BY CLA_STATUS ASC' , $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $task = $stmt->fetchAll();

        $sqlUser = sprintf("SELECT * FROM %s.dbo.CLIENTS_USERS WHERE CL_ID = :id", $so_database);

        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bindValue('id', $id);
        $stmtUser->execute();
        $user = $stmtUser->fetchAll();


        $sqlRegion = sprintf("SELECT * FROM %s.dbo.REGIONS WHERE RE_ID = :re_id", $so_database);



        $stmtRegions = $conn->prepare($sqlRegion);
        $stmtRegions->bindValue('re_id', $restresult[0]["RE_ID"]);
        $stmtRegions->execute();
        $region = $stmtRegions->fetchAll();


        $sqlActivite = sprintf("SELECT * FROM %s.dbo.ACTIVITES WHERE AC_ID = :ac_id", $so_database);

        $stmtActivite = $conn->prepare($sqlActivite);
        $stmtActivite->bindValue('ac_id', $restresult[0]["CL_ACTIVITE"]);
        $stmtActivite->execute();
        $activite = $stmtActivite->fetchAll();



        $sqlGroupe = sprintf("SELECT * FROM %s.dbo.GROUPE WHERE GR_ID = :gr_id", $so_database);

        $stmtGroupe = $conn->prepare($sqlGroupe);
        $stmtGroupe->bindValue('gr_id', $restresult[0]["CL_GROUPE"]);
        $stmtGroupe->execute();
        $groupe = $stmtGroupe->fetchAll();


        $sqlFonction = sprintf("SELECT * FROM %s.dbo.FONCTIONS WHERE SO_ID = 1 ", $so_database);

        $stmtFonctions = $conn->prepare($sqlFonction);
        $stmtFonctions->execute();
        $fonction = $stmtFonctions->fetchAll();


        $sqlProfil = sprintf("SELECT * FROM %s.dbo.PROFILS_USERS", $so_database);

        $stmtProfil = $conn->prepare($sqlProfil);
        $stmtProfil->execute();
        $profil = $stmtProfil->fetchAll();

        $sqlTachesArchive = sprintf("SELECT * FROM %s.dbo.CLIENTS_TACHES WHERE CL_ID = :cl_id AND CLA_STATUS = 10", $so_database);

        $stmtTachesArchive = $conn->prepare($sqlTachesArchive);
        $stmtTachesArchive->bindValue('cl_id', $id);
        $stmtTachesArchive->execute();
        $tacheArchive = $stmtTachesArchive->fetchAll();

        $sqlForTag = sprintf('SELECT * FROM %s.dbo.CLIENTS_TAG WHERE CL_ID = :id ORDER BY INS_DATE DESC', $so_database);

        $stmtForTag = $conn->prepare($sqlForTag);
        $stmtForTag->bindValue('id', $id);
        $stmtForTag->execute();
        $tag = $stmtForTag->fetchAll();


        $sqlForOrigine = sprintf('SELECT * FROM %s.dbo.CLIENTS_ORIG_CONTACT', $so_database);

        $stmtForOrigine = $conn->prepare($sqlForOrigine);
        $stmtForOrigine->bindValue('id', $id);
        $stmtForOrigine->execute();
        $origine = $stmtForOrigine->fetchAll();


        $sqlNotes = sprintf("SELECT CN_ID, CAST(CN_NOTE as TEXT) as CN_NOTE, INS_DATE, INS_USER FROM %s.dbo.CLIENTS_NOTES WHERE CL_ID = :cl_id ORDER BY INS_DATE DESC", $so_database);

        $stmtNotes = $conn->prepare($sqlNotes);
        $stmtNotes->bindValue('cl_id', $id);
        $stmtNotes->execute();
        $notes = $stmtNotes->fetchAll();


        $sqlTopFournConso = sprintf("SELECT (SELECT FO_RAISONSOC FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS WHERE FOURNISSEURS.FO_ID = CLIENTS_CONSO.FO_ID) as FO_ID, SUM(CLC_PRIX_PUBLIC - CLC_PRIX_CENTRALE) as Economie FROM %s.dbo.CLIENTS_CONSO WHERE CL_ID = :id GROUP BY FO_ID ORDER BY Economie DESC", $so_database);

        $stmtTopConso = $conn->prepare($sqlTopFournConso);
        $stmtTopConso->bindValue('id', $id);
        $stmtTopConso->execute();
        $topConso = $stmtTopConso->fetchAll();


        $sqlLastConso = sprintf("SELECT TOP 5 (SELECT FO_RAISONSOC FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS WHERE FOURNISSEURS.FO_ID = CLIENTS_CONSO.FO_ID) as FO_ID, CLC_DATE, CLC_PRIX_CENTRALE, CLC_PRIX_CENTRALE, CLC_PRIX_PUBLIC - CLC_PRIX_CENTRALE as Economie FROM %s.dbo.CLIENTS_CONSO WHERE CL_ID = :id ORDER BY CLC_DATE DESC", $so_database);
        $stmtLastConso = $conn->prepare($sqlLastConso);
        $stmtLastConso->bindValue('id', $id);
        $stmtLastConso->execute();
        $lastConso = $stmtLastConso->fetchAll();


        $sqlEconomieTotal = sprintf("SELECT sum(CLC_PRIX_PUBLIC - CLC_PRIX_CENTRALE) as Economie FROM %s.dbo.CLIENTS_CONSO WHERE CL_ID = :id", $so_database);
        $stmtEconomieTotal = $conn->prepare($sqlEconomieTotal);
        $stmtEconomieTotal->bindValue('id', $id);
        $stmtEconomieTotal->execute();
        $topEconomie = $stmtEconomieTotal->fetchAll()[0]["Economie"];


        dump($topEconomie);


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
                "tag" => $tag,
                "origine" => $origine,
                "topConso" => $topConso,
                "lastConso" => $lastConso,
                "topEconomie" => $topEconomie,

            ]
        );
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


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $siret = $request->request->get('siret');
        $mail = $request->request->get('mail');
        $tel = $request->request->get('tel');
        $cp = $request->request->get('cp');
        $eff = $request->request->get('eff');
        $ca = $request->request->get('ca');
        $adresse = $request->request->get('adresse');
        $ville = $request->request->get('ville');


        $sql = sprintf("UPDATE %s.dbo.CLIENTS
                SET CL_SIRET = :siret, CL_MAIL = :mail, CL_TEL = :tel, CL_CP = :cp, CL_EFFECTIF = :effectif, CL_CA = :ca, CL_ADRESSE1 = :adresse, CL_VILLE = :ville, MAJ_USER = :user, MAJ_DATE = GETDATE()
                WHERE CL_ID = :id", $so_database);


        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':siret', $siret);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':tel', $tel);
        $stmt->bindValue(':cp', $cp);
        $stmt->bindValue(':effectif', $eff);
        $stmt->bindValue(':ca', $ca);
        $stmt->bindValue(':adresse', $adresse);
        $stmt->bindValue(':ville', $ville);
        $stmt->bindValue(':id',$id);
        $stmt->bindValue(':user', $this->getUser()->getUsMail());

        $stmt->execute();



        $res = "client mise à jour";


        return new JsonResponse($res, 200);




    }

    public function updateClientUserAction(Request $request, $id, $centrale, $idUser)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $helper = $this->get('site.service.client_services');

        $so_database = $helper->getCentraleDB($centrale);

        $mail = $request->request->get('mail');
        $tel = $request->request->get('tel');
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $pass = $request->request->get('pass');


        $sql = sprintf('UPDATE %s.dbo.CLIENTS_USERS
                    SET CC_MAIL = :mail, CC_TEL = :tel, CC_PASS = :pass, CC_PRENOM = :prenom, CC_NOM = :nom, MAJ_DATE = GETDATE(), MAJ_USER = :user_maj
                    WHERE CC_ID = :id', $so_database);

        $stmt = $conn->prepare($sql);


        $stmt->bindValue("mail", $mail, 'text');
        $stmt->bindValue("tel", trim($tel), 'text');
        $stmt->bindValue("nom", $nom, 'text');
        $stmt->bindValue("prenom", $prenom, 'text');
        $stmt->bindValue("pass", $pass, 'text');
        $stmt->bindValue("user_maj", $this->getUser()->getUsMail(), 'text');
        $stmt->bindValue("id", $idUser);


        $result = $stmt->execute();



        return new JsonResponse($result, 200);



    }

    public function newNotesClientAction(Request $request, $id, $centrale)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $content_notes = $request->request->get('content_note');




        $sql = sprintf("INSERT INTO %s.dbo.CLIENTS_NOTES (CL_ID, CN_NOTE, INS_DATE, INS_USER)
                        VALUES ( :id, :content, GETUTCDATE(), :user)", $so_database);
        $stmt = $conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->bindValue("content", $content_notes);
        $stmt->bindValue("user", $this->getUser()->getUsMail());
        $stmt->execute();
        return new JsonResponse('Notes ajouté ', 200);






    }

    public function newClientsUserAction(Request $request, $id, $centrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $prenom = $request->request->get('prenom');
        $mail = $request->request->get('mail');
        $fonction = $request->request->get('fonction');
        $profil = $request->request->get('profil');
        $nom = $request->request->get('nom');
        $pwd = $request->request->get('pwd');
        $tel = $request->request->get('tel');
        $niveau = $request->request->get('niveau');
        $CCvalidation = $request->request->get('CCvalidation');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = sprintf("INSERT INTO %s.dbo.CLIENTS_USERS (CL_ID ,CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:cl,:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ", $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':cl', $id);
        $stmt->bindValue(':prenom', $prenom);
        $stmt->bindValue(':nom', $nom);
        $stmt->bindValue(':fonction', $fonction);
        $stmt->bindValue(':tel', $tel);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':pass', $pwd);
        $stmt->bindValue(':niveau', $niveau);
        $stmt->bindValue(':validation', $CCvalidation);
        $stmt->bindValue(':status', 0);
        $stmt->bindValue(':user', $this->getUser()->getUsMail());


        $stmt->execute();
        $user = $stmt->fetchAll();


        $res = "client mise à jour";

        return new JsonResponse($res, 200);

    }

    public function detailNoteAction(Request $request, $id, $idCentrale)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Notes  WHERE Vue_All_Notes.CN_ID = :id AND Vue_All_Notes.SO_ID = :centrale";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':centrale', $idCentrale);

        $stmt->execute();
        $result = $stmt->fetchAll();

        $clientService = $this->get('site.service.client_services');

        $user = $clientService->getUserName($result[0]['INS_USER']);



        if ($result) {
            $data = [
                "id" => $result[0]['CN_ID'],
                "nom" => $result[0]['CN_NOTE'],
                "ins_date" => $result[0]['INS_DATE'],
                "cl_id" => $result[0]['CL_ID'],
                "cl_raisonsoc" => $clientService->array_utf8_encode($clientService->getTheClientRaisonSoc($result[0]['CL_ID'], $result[0]['SO_ID'])),
                "ins_user" => $user[0]['US_PRENOM'],
                "centrale" => $clientService->getCentraleDB($result[0]['SO_ID']),
            ];
            $response = new JsonResponse($data);
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(200);
            return $response;
        } else {
            return new JsonResponse('no taches', 200);
        }
    }

    public function updateNoteAction(Request $request, $id, $idCentrale)
    {


        $note = $request->get('note');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($idCentrale);

        $conn = $this->get('database_connection');

        $sql = sprintf("UPDATE %s.dbo.CLIENTS_NOTES
                    SET CN_NOTE = :note, MAJ_DATE = GETDATE(), MAJ_USER = :user
                    WHERE CN_ID = :id", $so_database);


        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':note', $note);
        $stmt->bindValue(':user', $this->getUser()->getUsMail());
        $stmt->execute();
        $count = $stmt->fetchAll();


        return new JsonResponse($stmt->errorCode(), 200);






    }

    public function detailRdvAction(Request $request, $id, $idCentrale)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE Vue_All_Taches.CLA_ID = :id
                AND Vue_All_Taches.SO_ID = :centrale
                AND CLA_TYPE = 5";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':centrale', $idCentrale);

        $stmt->execute();
        $result = $stmt->fetchAll();


        if ($result) {

            $creation = new \Moment\Moment($result[0]['INS_DATE'], 'Europe/Berlin');
            $creationFromNow = $creation->calendar();

            $echeance = new \Moment\Moment($result[0]['CLA_ECHEANCE'], 'Europe/Berlin');
            $echanceFuture = $echeance->calendar();



            $data = [
                "id" => $result[0]['CLA_ID'],
                "nom" => $result[0]['CLA_DESCR'],
                "ins_date" => $creationFromNow,
                "echeance" => $echanceFuture
            ];
            $response = new JsonResponse($data);
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(200);
            return $response;
        } else {
            return new JsonResponse('no taches', 200);
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

    public function getClientRaisonSocAction($id, $centrale)
    {


        $conn = $this->get('database_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $sql = sprintf("SELECT * FROM %s.dbo.CLIENTS WHERE CL_ID = :id", $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $clients = $stmt->fetchAll();


        if(!$centrale){
            return "NO_CENTRALE";
        }

        if(!$clients){
            return new Response('Client introuvable', 200);
        }

        $result = $clientService->array_utf8_encode($clients);


        return new Response($result[0]["CL_RAISONSOC"], 200);




    }

    public function getUserAutocompleteAction(Request $request, $query)
    {

        header("Access-Control-Allow-Origin: *");


        $conn = $this->get('database_connection');


        $sql = 'SELECT *
                FROM CENTRALE_ACHAT.dbo.USERS
                WHERE US_PRENOM LIKE :query
                  ';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('query', '%' . $query . '%');
        $stmt->execute();

        $users = $stmt->fetchAll();

        $result = [
            "total_count" => count($users),
            "incomplete_results" => false,
            "items" => $users
        ];

        return new JsonResponse($result, 200);
    }

    public function getClientAutocompleteAction(Request $request, $query, $centrale)
    {

        header("Access-Control-Allow-Origin: *");


        $conn = $this->get('database_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);



        $sql = sprintf("SELECT CL_RAISONSOC, CL_REF, CL_ID
                FROM %s.dbo.CLIENTS
                WHERE CLIENTS.CL_RAISONSOC LIKE :query", $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('query', '%' . $query . '%');
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

    public function getClientUserAction(Request $request, $id, $centrale)
    {
        $conn = $this->get('database_connection');
        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL
                        FROM %s.dbo.CLIENTS_USERS
                        WHERE CC_ID = :id", $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $ccUser = $stmt->fetchAll();

        $clientService->array_utf8_encode($ccUser);

        $response = new Response(json_encode($ccUser, JSON_UNESCAPED_UNICODE));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    public function getClientLabelAction(Request $request, $id, $centrale)
    {


        header("Access-Control-Allow-Origin: *");


        $conn = $this->get('database_connection');


        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $sql = sprintf("SELECT * FROM %s.dbo.CLIENTS WHERE CL_ID = :id", $so_database);
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $data = [
            "raisonSoc" => $result[0]['CL_RAISONSOC']
        ];

        return new JsonResponse($data, 200);


    }

    public function exportClientAction(Request $request, $centrale)
    {
        $conn = $this->get('database_connection');

        if($centrale === "all"){
            $conn = $this->get('database_connection');
            $stmt = $conn->prepare('SELECT (SELECT DISTINCT SO_RAISONSOC FROM CENTRALE_ACHAT.dbo.Vue_SocietesUsers WHERE Vue_SocietesUsers.SO_ID = CENTRALE_ACHAT.dbo.Vue_All_Clients.SO_ID) AS CENTRALE,SO_ID, CL_ID, CL_REF, CL_RAISONSOC, CL_ADRESSE1, CL_SIRET, CL_CP, CL_VILLE, CL_PAYS, CL_TEL, CL_MAIL, CL_WEB, CL_DT_ADHESION, (
                          CASE CL_STATUS
                            WHEN 0 THEN \'A valide\'
                            WHEN 1 THEN \'Valide\'
                            WHEN 2 THEN \'Bloque\'
                          END
                        ) AS STATUT, CL_ADHESION, CL_STATUS, CL_ADHESION, CC_PRENOM, CC_NOM, CC_MAIL, GR_DESCR, AC_DESCR
                        FROM CENTRALE_ACHAT.dbo.Vue_All_Clients');
            $stmt->execute();
            $response = new StreamedResponse();
            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv');
            $response->setCallback(function () use ($stmt) {
                $config = new ExporterConfig();
                $config
                    ->setDelimiter(";")
                    ->setFileMode(CsvFileObject::FILE_MODE_WRITE);
                $exporter = new Exporter($config);
                $exporter->export('php://output', $stmt->fetchAll());
            });
            $response->send();
            return $response;
        } else {

            $clientService = $this->get('site.service.client_services');

            $so_database = $clientService->getCentraleDB($centrale);

            $conn = $this->get('database_connection');
            $stmt = $conn->prepare(sprintf('SELECT * FROM %s.dbo.CLIENTS', $so_database ));
            $stmt->execute();
            $response = new StreamedResponse();
            $response->setStatusCode(200);
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="export-'.$so_database.'-'.date('mdys').'.csv"');
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

        }






    }

    public function getUsersClientAction(Request $request, $id, $centrale){


        $conn = $this->get('database_connection');
        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("SELECT CC_ID, CC_NOM, CC_PRENOM, CC_PASS, CC_TEL, CC_MAIL, CC_FONCTION
                        FROM %s.dbo.CLIENTS_USERS
                        WHERE CL_ID = :id", $so_database);



        $stmt = $conn->prepare($sql);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $user = $stmt->fetchAll();





        $result = [
            "CC_ID" => $clientService->array_utf8_encode($user["CC_ID"]),
            "CC_NOM" => $user["CC_NOM"],
            "CC_PRENOM" => $user["CC_PRENOM"],
            "CC_PASS" => $clientService->array_utf8_encode($user["CC_PASS"]),
            "CC_TEL" => $clientService->array_utf8_encode($user["CC_TEL"]),
            "CC_MAIL" => $clientService->array_utf8_encode($user["CC_MAIL"]),
        ];

        $response = new Response(json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));
        $response->headers->set('Content-Type', 'application/json;');
        $response->setStatusCode(200);
        return $response;



    }

    public function updateMailClientAction(Request $request, $id, $centrale)
    {

        $mail = $request->request->get('mail');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("UPDATE %s.dbo.CLIENTS
                SET CL_MAIL = :mail, MAJ_USER = :user, MAJ_DATE = GETDATE()
                WHERE CL_ID = :id", $so_database);


        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':mail', $mail);
        $stmt->bindValue(':user', $this->getUser()->getUsMail());
        $stmt->bindValue(':id',$id);

        $stmt->execute();


        return new JsonResponse('ok', 200);
    }

    public function removeNoteAction(Request $request, $id, $centrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("DELETE FROM %s.dbo.CLIENTS_NOTES WHERE CN_ID = :id", $so_database);
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();


        return new JsonResponse("ok", 200);
    }


}


