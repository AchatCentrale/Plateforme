<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TacheController extends Controller
{


    public function TacheAction()
    {



        $user = $this->getUser();


        if($user->getUsId() === 2){


            $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

            $sql = "SELECT CL_ID, CLA_STATUS,INS_USER, CLA_ECHEANCE, CLA_DESCR, CLA_PRIORITE, CLA_TYPE, CLA_NOM, CLA_ID, SO_ID, INS_DATE, US_ID
                    FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                    WHERE CLA_STATUS <> 10
                    ORDER BY INS_DATE DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usId', $user->getUsId());


            $stmt->execute();
            $task = $stmt->fetchAll();



            return $this->render('@Site/Base/tache.home.html.twig', [
                'task' => $task,
            ]);
        }


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT CL_ID, CLA_STATUS, CLA_ECHEANCE,INS_USER, CLA_DESCR, CLA_PRIORITE, CLA_TYPE, CLA_NOM, CLA_ID, SO_ID, INS_DATE, US_ID
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE US_ID = :usId
                AND CLA_STATUS <> 10
                ORDER BY INS_DATE DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usId', $user->getUsId());


        $stmt->execute();
        $task = $stmt->fetchAll();




        return $this->render('@Site/Base/tache.home.html.twig', [
            'task' => $task,
        ]);
    }

    public function DetailTaskAction($id, $idCentrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        switch ($idCentrale) {

            case 1:
                //Achatcentrale
                \Moment\Moment::setLocale('fr_FR');
                $sqlTask = "SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES LEFT JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = CENTRALE_ACHAT.dbo.CLIENTS_TACHES.INS_USER WHERE CENTRALE_ACHAT.dbo.CLIENTS_TACHES.CLA_ID = :id";
                $stmt = $conn->prepare($sqlTask);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $resultTask = $stmt->fetchAll();
                if ($resultTask) {
                    $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => $resultTask[0]['CLA_ID'],
                        "cl_id" => $resultTask[0]['CL_ID'],
                        "nom" => $resultTask[0]['CLA_ID'],
                        "descr" => $resultTask[0]['CLA_DESCR'],
                        "user" => $resultTask[0]['US_PRENOM'],
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => $resultTask[0]['CLA_STATUS'],
                        "centrale" => "ACHAT_CENTRALE",
                    ];
                    $response = new JsonResponse($data);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->setStatusCode(200);
                    return $response;
                } else {
                    return new JsonResponse('no taches', 200);
                }
                break;
            case 2:
                //GCCP
                \Moment\Moment::setLocale('fr_FR');
                $sqlTask = "SELECT * FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES LEFT JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = CENTRALE_GCCP.dbo.CLIENTS_TACHES.INS_USER WHERE CENTRALE_GCCP.dbo.CLIENTS_TACHES.CLA_ID = :id";
                $stmt = $conn->prepare($sqlTask);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $resultTask = $stmt->fetchAll();
                if ($resultTask) {
                    $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => $resultTask[0]['CLA_ID'],
                        "cl_id" => $resultTask[0]['CL_ID'],
                        "nom" => $resultTask[0]['CLA_ID'],
                        "descr" => $resultTask[0]['CLA_DESCR'],
                        "user" => $resultTask[0]['US_PRENOM'],
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => $resultTask[0]['CLA_STATUS'],
                    ];
                    $response = new JsonResponse($data);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->setStatusCode(200);
                    return $response;
                } else {
                    return new JsonResponse('no taches', 200);
                }
                break;
            case 4:
                //FUNECAP
                \Moment\Moment::setLocale('fr_FR');
                $sqlTask = "SELECT * FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES LEFT JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = CENTRALE_FUNECAP.dbo.CLIENTS_TACHES.INS_USER WHERE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES.CLA_ID = :id";
                $stmt = $conn->prepare($sqlTask);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $resultTask = $stmt->fetchAll();
                if ($resultTask) {
                    $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => $resultTask[0]['CLA_ID'],
                        "cl_id" => $resultTask[0]['CL_ID'],
                        "nom" => $resultTask[0]['CLA_ID'],
                        "descr" => $resultTask[0]['CLA_DESCR'],
                        "user" => $resultTask[0]['US_PRENOM'],
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => $resultTask[0]['CLA_STATUS'],
                    ];
                    $response = new JsonResponse($data);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->setStatusCode(200);
                    return $response;
                } else {
                    return new JsonResponse('no taches', 200);
                }
                break;
            case 5:
                //FUNECAP
                \Moment\Moment::setLocale('fr_FR');
                $sqlTask = "SELECT * FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES LEFT JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = CENTRALE_PFPL.dbo.CLIENTS_TACHES.INS_USER WHERE CENTRALE_PFPL.dbo.CLIENTS_TACHES.CLA_ID = :id";
                $stmt = $conn->prepare($sqlTask);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $resultTask = $stmt->fetchAll();
                if ($resultTask) {
                    $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => $resultTask[0]['CLA_ID'],
                        "cl_id" => $resultTask[0]['CL_ID'],
                        "nom" => $resultTask[0]['CLA_ID'],
                        "descr" => $resultTask[0]['CLA_DESCR'],
                        "user" => $resultTask[0]['US_PRENOM'],
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => $resultTask[0]['CLA_STATUS'],
                    ];
                    $response = new JsonResponse($data);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->setStatusCode(200);
                    return $response;
                } else {
                    return new JsonResponse('no taches', 200);
                }
                break;
            case 6:
                //ROC
                \Moment\Moment::setLocale('fr_FR');
                $sqlTask = "SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES LEFT JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES.INS_USER WHERE CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES.CLA_ID = :id";
                $stmt = $conn->prepare($sqlTask);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $resultTask = $stmt->fetchAll();
                if ($resultTask) {
                    $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => $resultTask[0]['CLA_ID'],
                        "nom" => $resultTask[0]['CLA_ID'],
                        "cl_id" => $resultTask[0]['CL_ID'],
                        "descr" => $resultTask[0]['CLA_DESCR'],
                        "user" => $resultTask[0]['US_PRENOM'],
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => $resultTask[0]['CLA_STATUS'],
                    ];
                    $response = new JsonResponse($data);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->setStatusCode(200);
                    return $response;
                } else {
                    return new JsonResponse('no taches', 200);
                }
                break;




        }


    }

    public function UnArchiveTaskAction($id){
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "UPDATE CLIENTS_TACHES
                SET
                  CLA_STATUS = 0,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return new Response('taches numero :  ' . $id . ' archivé', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function ArchiveTaskAction($id, $centrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){
            case "1":
                $sql = "
                   UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                 SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETUTCDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());


                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "2":
                $sql = "UPDATE CENTRALE_GCCP.dbo.CLIENTS_TACHES
                 SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETUTCDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                 SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETUTCDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "5":
                $sql = "UPDATE CENTRALE_PFPL.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETUTCDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "6":
                $sql = "UPDATE CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                 SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETUTCDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
        }



    }

    public function DeleteTaskAction($id, $centrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){
            case "1":
                $sql = "
                    DELETE FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "2":
                $sql = "
                    DELETE FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "4":
                $sql = "
                    DELETE FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "5":
                $sql = "
                    DELETE FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "6":
                $sql = "
                    DELETE FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
        }



    }

    public function NewTaskAction(Request $request)
    {


        $centrale = $request->query->get('c');
        $clientChoice = $request->query->get('cl');
        $mailer = $this->get('site.service.mailer');

        switch ($centrale) {

            case 'ROC_ECLERC':
            case 'roc':
                $req = $request->request;
                $task = new \RocEclercBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ActionType')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();

                if ($clientChoice){

                    $clients = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findBy([
                        'clId' => $clientChoice
                    ]);
                }else{
                    $clients = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findAll();
                }
                if ($request->getMethod() == "POST") {



                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));
                    $task->setClaType($req->get('cla_type'))
                        ->setClaNom($req->get('cla_nom'))
                        ->setClaDescr($req->get('cla_desc'))
                        ->setClaPriorite($req->get('cla_priorite'))
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req->get('cla_us'))
                        ->setInsUser($this->getUser()->getusId())
                        ->setClId($req->get('cla_cl'));


                    $em = $this->getDoctrine()->getManager('roc_eclerc');
                    $em->persist($task);
                    $em->flush();





                    $mailer->sendTaskNotification($task->getClaId(), "ROC_ECLERC" );


                    return $this->redirectToRoute('taches_home', [

                    ], 301);
                }
                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                        'type' => $type,
                        'client' => $clients,
                        'user' => $user,
                        'centrale' => $centrale,
                    ]
                );
                break;
            case 'CENTRALE_FUNECAP':
            case 'funecap':
                $req = $request->request;
                $task = new \FunecapBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ActionType')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();

                if ($clientChoice){

                    $clients = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findBy([
                        'clId' => $clientChoice
                    ]);

                }else{

                    $clients = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findAll();
                }

                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));
                    $task
                        ->setClaType($req->get('cla_type'))
                        ->setClaNom($req->get('cla_nom'))
                        ->setClaDescr($req->get('cla_desc'))
                        ->setClaPriorite($req->get('cla_priorite'))
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req->get('cla_us'))
                        ->setInsUser($this->getUser()->getusId())
                        ->setClId($req->get('cla_cl'));
                    $em = $this->getDoctrine()->getManager('centrale_funecap');
                    $em->persist($task);
                    $em->flush();


                    $mailer->sendTaskNotification($task->getClaId(), "CENTRALE_FUNECAP" );



                    return $this->redirectToRoute('taches_home', [

                    ], 301);
                }
                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                        'type' => $type,
                        'client' => $clients,
                        'user' => $user,
                        'centrale' => $centrale
                    ]
                );
                break;
            case 'ACHAT_CENTRALE':
            case 'ac':

                $req = $request->request;
                $task = new \AchatCentraleBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ActionType')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();

                if ($clientChoice){

                    $clients = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findBy([
                        'clId' => $clientChoice
                    ]);

                }else{

                    $clients = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findAll();
                }



                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));
                    $task
                        ->setClaType($req->get('cla_type'))
                        ->setClaNom($req->get('cla_nom'))
                        ->setClaDescr($req->get('cla_desc'))
                        ->setClaPriorite($req->get('cla_priorite'))
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req->get('cla_us'))
                        ->setInsUser($this->getUser()->getusId())
                        ->setClId($req->get('cla_cl'));
                    $em = $this->getDoctrine()->getManager('achat_centrale');
                    $em->persist($task);
                    $em->flush();

                    $mailer->sendTaskNotification($task->getClaId(), "ACHAT_CENTRALE" );



                    return $this->redirectToRoute('taches_home', [

                    ], 301);
                }
                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                        'type' => $type,
                        'client' => $clients,
                        'user' => $user,
                        'centrale' => $centrale
                    ]
                );
                break;
            case 'CENTRALE_PFPL':
            case 'pfpl':
                $req = $request->request;
                $task = new \PfplBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ActionType')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();



                if ($clientChoice){

                    $clients = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findBy([
                        'clId' => $clientChoice
                    ]);

                }else{

                    $clients = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findAll();
                }

                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));
                    $task
                        ->setClaType($req->get('cla_type'))
                        ->setClaNom($req->get('cla_nom'))
                        ->setClaDescr($req->get('cla_desc'))
                        ->setClaPriorite($req->get('cla_priorite'))
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req->get('cla_us'))
                        ->setInsUser($this->getUser()->getusId())
                        ->setClId($req->get('cla_cl'));
                    $em = $this->getDoctrine()->getManager('centrale_pascal_leclerc');
                    $em->persist($task);
                    $em->flush();

                    $mailer->sendTaskNotification($task->getClaId(), "CENTRALE_PFPL" );


                    return $this->redirectToRoute('taches_home', [

                    ], 301);
                }
                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                        'type' => $type,
                        'client' => $clients,
                        'user' => $user,
                        'centrale' => $centrale
                    ]
                );
                break;
            case 'CENTRALE_GCCP':
            case 'gccp':

                $req = $request->request;
                $task = new \GccpBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ActionType')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();



                if ($clientChoice){

                    $clients = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findBy([
                        'clId' => $clientChoice
                    ]);

                }else{

                    $clients = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findAll();
                }


                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));
                    $task
                        ->setClaType($req->get('cla_type'))
                        ->setClaNom($req->get('cla_nom'))
                        ->setClaDescr($req->get('cla_desc'))
                        ->setClaPriorite($req->get('cla_priorite'))
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req->get('cla_us'))
                        ->setInsUser($this->getUser()->getusId())
                        ->setClId($req->get('cla_cl'));
                    $em = $this->getDoctrine()->getManager('centrale_gccp');
                    $em->persist($task);
                    $em->flush();


                    $mailer->sendTaskNotification($task->getClaId(), "CENTRALE_GCCP" );


                    return $this->redirectToRoute('taches_home', [

                    ], 301);
                }
                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                        'type' => $type,
                        'client' => $clients,
                        'user' => $user,
                        'centrale' => $centrale
                    ]
                );
                break;

        }



    }

    public function changetheStateAction($state, $id, $centrale)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "2":
                $sql = "UPDATE CENTRALE_GCCP.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "5":
                $sql = "UPDATE CENTRALE_PFPL.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "6":
                $sql = "UPDATE CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
        }
    }

    public function sendMailTaskAction($id)
    {


        $mailer = $this->get('site.service.mailer');





        $mailer->sendTestMessage($id);

        return $this->render('@Site/test.html.twig');


    }

    public function UpdateTaskAction(Request $request, $id, $centrale)
    {





        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){


            case "ACHAT_CENTRALE":
            case "1":
               $sqlTask = "SELECT CLA_NOM, CLA_DESCR, US_ID, CLA_ECHEANCE FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES WHERE CLA_ID = :id";
               $stmt = $conn->prepare($sqlTask);
               $stmt->bindValue(':id', $id);
               $stmt->execute();
               $resultTask = $stmt->fetchAll();
               $resultUser = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $echeanceNew = $request->get('cla_echeance');
                    $nomNew = $request->get('cla_nom');
                    $descrNew = $request->get('cla_desc');
                    $usNew = $request->get('cla_us');
                    $prioriteNew = $request->get('cla_priorite');
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $echeanceNew);
                    $sqlUpdate = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                                  SET
                                    CLA_DESCR = :desc,
                                    CLA_NOM = :nom,
                                    CLA_ECHEANCE = :echeance,
                                    CLA_PRIORITE = :priorite,
                                    MAJ_DATE = GETDATE(),
                                    US_ID = :us,
                                    MAJ_USER = :user                                    
                                  WHERE CLA_ID = :id";
                    $stmt = $conn->prepare($sqlUpdate);
                    $stmt->bindValue(':id', $id);
                    $stmt->bindValue(':user', $this->getUser()->getUsMail());
                    $stmt->bindValue(':desc', $descrNew);
                    $stmt->bindValue(':nom', $nomNew);
                    $stmt->bindValue(':us', $usNew);
                    $stmt->bindValue(':echeance', $date_echeance2->format('Y-m-d H:i:s'));
                    $stmt->bindValue(':priorite', $prioriteNew);
                    $stmt->execute();
                    $update = $stmt->fetchAll();

                    return $this->redirectToRoute('taches_home', [], 301);

                }
                return $this->render('@Site/ui-element/taches/action.form.update.html.twig', [
                    'task' => $resultTask,
                    'centrale' => "ACHAT_CENTRALE",
                    'user' => $resultUser,
                    'id' => $id
                ]);
            case "CENTRALE_GCCP":
            case "2":
            $sqlTask = "SELECT CLA_NOM, CLA_DESCR, US_ID, CLA_ECHEANCE FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES WHERE CLA_ID = :id";
            $stmt = $conn->prepare($sqlTask);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultTask = $stmt->fetchAll();
            $resultUser = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
            if ($request->getMethod() == "POST") {
                $echeanceNew = $request->get('cla_echeance');
                $nomNew = $request->get('cla_nom');
                $descrNew = $request->get('cla_desc');
                $usNew = $request->get('cla_us');
                $prioriteNew = $request->get('cla_priorite');
                $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $echeanceNew);
                $sqlUpdate = "UPDATE CENTRALE_GCCP.dbo.CLIENTS_TACHES
                                  SET
                                    CLA_DESCR = :desc,
                                    CLA_NOM = :nom,
                                    CLA_ECHEANCE = :echeance,
                                    CLA_PRIORITE = :priorite,
                                    MAJ_DATE = GETDATE(),
                                    US_ID = :us,
                                    MAJ_USER = :user
                                  WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());
                $stmt->bindValue(':desc', $descrNew);
                $stmt->bindValue(':nom', $nomNew);
                $stmt->bindValue(':us', $usNew);
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->bindValue(':echeance', $date_echeance2->format('Y-m-d H:i:s'));
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->execute();
                $update = $stmt->fetchAll();

                return $this->redirectToRoute('taches_home', [], 301);

            }
            return $this->render('@Site/ui-element/taches/action.form.update.html.twig', [
                'task' => $resultTask,
                'centrale' => "CENTRALE_GCCP",
                'user' => $resultUser,
                'id' => $id
            ]);
            case "CENTRALE_FUNECAP":
            case "4":
            $sqlTask = "SELECT CLA_NOM, CLA_DESCR, US_ID, CLA_ECHEANCE FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES WHERE CLA_ID = :id";
            $stmt = $conn->prepare($sqlTask);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultTask = $stmt->fetchAll();
            $resultUser = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
            if ($request->getMethod() == "POST") {
                $echeanceNew = $request->get('cla_echeance');
                $nomNew = $request->get('cla_nom');
                $descrNew = $request->get('cla_desc');
                $usNew = $request->get('cla_us');
                $prioriteNew = $request->get('cla_priorite');
                $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $echeanceNew);
                $sqlUpdate = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                                  SET
                                    CLA_DESCR = :desc,
                                    CLA_NOM = :nom,
                                    CLA_ECHEANCE = :echeance,
                                    CLA_PRIORITE = :priorite,
                                    MAJ_DATE = GETDATE(),
                                    US_ID = :us,
                                    MAJ_USER = :user
                                  WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());
                $stmt->bindValue(':desc', $descrNew);
                $stmt->bindValue(':nom', $nomNew);
                $stmt->bindValue(':us', $usNew);
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->bindValue(':echeance', $date_echeance2->format('Y-m-d H:i:s'));
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->execute();
                $update = $stmt->fetchAll();

                return $this->redirectToRoute('taches_home', [], 301);

            }
            return $this->render('@Site/ui-element/taches/action.form.update.html.twig', [
                'task' => $resultTask,
                'centrale' => "CENTRALE_FUNECAP",
                'user' => $resultUser,
                'id' => $id
            ]);
            case "CENTRALE_PFPL":
            case "5":
            $sqlTask = "SELECT CLA_NOM, CLA_DESCR, US_ID, CLA_ECHEANCE FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES WHERE CLA_ID = :id";
            $stmt = $conn->prepare($sqlTask);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultTask = $stmt->fetchAll();
            $resultUser = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
            if ($request->getMethod() == "POST") {
                $echeanceNew = $request->get('cla_echeance');
                $nomNew = $request->get('cla_nom');
                $descrNew = $request->get('cla_desc');
                $usNew = $request->get('cla_us');
                $prioriteNew = $request->get('cla_priorite');
                $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $echeanceNew);
                $sqlUpdate = "UPDATE CENTRALE_PFPL.dbo.CLIENTS_TACHES
                                  SET
                                    CLA_DESCR = :desc,
                                    CLA_NOM = :nom,
                                    CLA_ECHEANCE = :echeance,
                                    CLA_PRIORITE = :priorite,
                                    US_ID = :us,
                                    MAJ_DATE = GETDATE(),
                                    MAJ_USER = :user
                                  WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':user', $this->getUser()->getUsMail());
                $stmt->bindValue(':desc', $descrNew);
                $stmt->bindValue(':nom', $nomNew);
                $stmt->bindValue(':us', $usNew);
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->bindValue(':echeance', $date_echeance2->format('Y-m-d H:i:s'));
                $stmt->bindValue(':priorite', $prioriteNew);
                $stmt->execute();
                $update = $stmt->fetchAll();

                return $this->redirectToRoute('taches_home', [], 301);

            }
            return $this->render('@Site/ui-element/taches/action.form.update.html.twig', [
                'task' => $resultTask,
                'centrale' => "CENTRALE_PFPL",
                'user' => $resultUser,
                'id' => $id
            ]);



        }




        return $this->render('@Site/test.html.twig');

    }

    public function terminerTacheAction(Request $request, $id, $centrale){

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){

            case "ACHAT_CENTRALE":
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_GCCP":
            case "2":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_FUNECAP":
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_PFPL":
            case "5":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');



        }



    }


    public function terminerRdvAction(Request $request, $id, $centrale){

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){

            case "ACHAT_CENTRALE":
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '30' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_GCCP":
            case "2":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_FUNECAP":
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_PFPL":
            case "5":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');



        }


    }

}
