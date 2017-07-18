<?php

namespace SiteBundle\Controller;


use AchatCentrale\CrmBundle\Entity\ClientsNotes;
use AchatCentrale\CrmBundle\Entity\ClientsUsers;
use DateTime;
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
        $clientService = $this->get('site.service.client_services');
        $dataCount = $clientService->getTheCount();

        $user = $this->getUser();
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT *
                FROM Vue_All_Taches
                WHERE US_ID = :usId
                AND CLA_STATUS = 0
                OR CLA_STATUS = 1
                ORDER BY CLA_ECHEANCE DESC
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
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';


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
                                    VALUES (1, :re,:ref, :raisonSoc, :siret, :adresse,:cp,:classif ,:ville,:pays, :tel,:mail, :web, 0, :status, :activite, :groupe , :effectif, :ca, GETUTCDATE(), :user, DATEADD(YEAR, +1, GETDATE())  )';


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
                   'SELECT DISTINCT
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
                        WHERE CL_ID = :id';

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
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ClientsNotes')->findBy([
                    'clId' => $id,
                ], [
                    'insDate' => 'ASC'
                ]);
                $fonction = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ProfilsUsers')->findAll();


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
                        "fonction" => $fonction,
                        "profil" => $profil,

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
                  WHERE CL_ID = :id';

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
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'ASC'
                ]);
                $fonction = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ProfilsUsers')->findAll();


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
                        "fonction" => $fonction,
                        "profil" => $profil,

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
                ORDER BY CLA_STATUS ASC';

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
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ProfilsUsers')->findAll();



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
                        "fonction" => $fonction,
                        "profil" => $profil,

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
                ORDER BY CLA_STATUS ASC';

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
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ProfilsUsers')->findAll();


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
                        "fonction" => $fonction,
                        "profil" => $profil,

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
                ORDER BY CLA_STATUS ASC';

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
                    'grId' => $id
                ]);


                $notes = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsNotes')->findBy([
                    'clId' => $id,

                ], [
                    'insDate' => 'DESC'
                ]);


                $fonction = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Fonctions')->findBy([
                    'soId' => 1,
                ]);

                $profil = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ProfilsUsers')->findAll();



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
                        "fonction" => $fonction,
                        "profil" => $profil,

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
            default:
                break;
        }

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

                $em = $this->getDoctrine()->getManager('roc_eclerc');

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

                $sql = "INSERT INTO CENTRALE_ROC_ECLERC.dbo.CLIENTS_USERS ( CC_PRENOM, CC_NOM, CC_FONCTION, CC_TEL, CC_MAIL, CC_PASS, CC_NIVEAU, CIRCUIT_VALIDATION, CC_STATUS, INS_DATE, INS_USER)
    VALUES
      (:prenom,:nom, :fonction, :tel, :mail, :pass, :niveau, :validation, :status, GETDATE(), :user)
      ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':prenom', $prenom);
                $stmt->bindValue(':nom', $nom);
                $stmt->bindValue(':fonction', $fonction);
                $stmt->bindValue(':tel', $tel);
                $stmt->bindValue(':mail', $mail);
                $stmt->bindValue(':pass', $pwd);
                $stmt->bindValue(':niveau', $niveau);
                $stmt->bindValue(':niveau',$CCvalidation );
                $stmt->bindValue(':status',$profil );
                $stmt->bindValue(':user', $this->getUser()->getUsId() );


                $stmt->execute();
                $user = $stmt->fetchAll();



                $res = "client mise à jour";

                return new JsonResponse($res, 200, [
                    'Access-Control-Allow-Origin' => '*'
                ]);
                break;


            case 'CENTRALE_FUNECAP':

                $em = $this->getDoctrine()->getManager('centrale_funecap_jb');


                $prenom = $request->request->get('prenom');
                $mail = $request->request->get('mail');
                $fonction = $request->request->get('fonction');
                $profil = $request->request->get('profil');
                $nom = $request->request->get('nom');
                $pwd = $request->request->get('pwd');
                $tel = $request->request->get('tel');
                $niveau = $request->request->get('niveau');
                $CCvalidation = $request->request->get('CCvalidation');

                $client = $em->getRepository('FunecapBundle:Clients')->findBy([
                    'clId' => $id
                ]);

                if (!$client) {
                    throw $this->createNotFoundException(
                        'Pas de client pour l\'id ' . $id
                    );
                }
                if (!$this->getUser()->getusMail()) {
                    throw $this->createNotFoundException(
                        'pas d\'email'
                    );
                }

                $clientUsers = new \FunecapBundle\Entity\ClientsUsers();
                $clientUsers
                    ->setCl($client[0])
                    ->setInsUser($this->getUser()->getusMail())
                    ->setCcFonction($fonction)
                    ->setCcNiveau($niveau)
                    ->setCcPass($pwd)
                    ->setCcMail($mail)
                    ->setCcPrenom($prenom)
                    ->setCcNom($nom)
                    ->setCcTel($tel)
                    ->setPuId($profil)
                    ->setCcStatus(0)
                    ->setInsDate(new DateTime('now'))
                    ->setCircuitValidation($CCvalidation);
                $em->persist($clientUsers);
                $em->flush();
                $res = "client mise à jour";

                return new JsonResponse($res, 200, [
                    'Access-Control-Allow-Origin' => '*'
                ]);
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


        return $this->render('@Site/ui-element/feed.list.html.twig', [
            'lastAction' => $feed->getAction(),
            'lastTicket' => $feed->getTickets(),
            'lastNote' => $feed->getNotes(),
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


        $clients = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findAll();


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


}


