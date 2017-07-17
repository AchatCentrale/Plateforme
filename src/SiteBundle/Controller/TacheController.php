<?php

namespace SiteBundle\Controller;

use AchatCentraleBundle\Form\ClientsTachesType as acClientsTachesType;
use FunecapBundle\Form\ClientsTachesType as fClientsTachesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TacheController extends Controller
{


    public function TacheAction()
    {



        $user = $this->getUser();


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT CL_ID, CLA_STATUS, CLA_ECHEANCE, CLA_DESCR, CLA_PRIORITE, CLA_TYPE, CLA_NOM, CLA_ID, SO_ID, INS_DATE
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE US_ID = :usId
                ORDER BY CLA_STATUS ASC";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usId', $user->getUsId());


        $stmt->execute();
        $task = $stmt->fetchAll();




        return $this->render('@Site/Base/tache.home.html.twig', [
            'task' => $task,
            'user' => $user->getUsPrenom(),
        ]);
    }

    public function DeleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $task = $em->getRepository('AchatCentraleCrmBundle:ClientsTaches')->find($id);

        if (!$task) {
            throw $this->createNotFoundException('Pas de taches :(');
        }

        $em->remove($task);
        $em->flush();
        return new JsonResponse('ok', 200);
    }

    public function DetailTaskAction($id, $idCentrale)
    {

        switch ($idCentrale) {

            case 1:
                //Achatcentrale
                \Moment\Moment::setLocale('fr_FR');
                $tacheUtil = $this->get('site.service.taches_utils');
                $task = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ClientsTaches');
                $result = $task->findOneBy([ 'claId' => $id ]);
                if ($result) {
                    $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findBy([ 'usId' => $result->getInsUser() ]);
                    $creation = new \Moment\Moment($result->getInsDate()->format('Y-m-d H:i:s'), 'UTC');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($result->getClaEcheance()->format('Y-m-d H:i:s'), 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => utf8_encode($result->getClaId()),
                        "nom" => utf8_encode($result->getclaNom()),
                        "descr" => utf8_encode($result->getclaDescr()),
                        "user" => utf8_encode($user[0]->getUsPrenom()),
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => utf8_encode($result->getClaStatus())
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
                $tacheUtil = $this->get('site.service.taches_utils');
                $task = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ClientsTaches');
                $result = $task->findOneBy([
                    'claId' => $id
                ]);
                if ($result) {

                    $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findBy([ 'usId' => $result->getInsUser() ]);

                    $creation = new \Moment\Moment($result->getInsDate()->format('Y-m-d H:i:s'), 'UTC');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($result->getClaEcheance()->format('Y-m-d H:i:s'), 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => utf8_encode($result->getClaId()),
                        "nom" => utf8_encode($result->getclaNom()),
                        "descr" => utf8_encode($result->getclaDescr()),
                        "user" => utf8_encode($user[0]->getUsPrenom()),
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => utf8_encode($result->getClaStatus())

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
                $tacheUtil = $this->get('site.service.taches_utils');
                $task = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ClientsTaches');
                $result = $task->findOneBy([
                    'claId' => $id
                ]);
                if ($result) {

                    $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findBy([ 'usId' => $result->getInsUser() ]);


                    $creation = new \Moment\Moment($result->getInsDate()->format('Y-m-d H:i:s'), 'UTC');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($result->getClaEcheance()->format('Y-m-d H:i:s'), 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => utf8_encode($result->getClaId()),
                        "nom" => utf8_encode($result->getclaNom()),
                        "descr" => utf8_encode($result->getclaDescr()),
                        "user" => utf8_encode($user[0]->getUsPrenom()),
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => utf8_encode($result->getClaStatus())

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
                //PFPL

                \Moment\Moment::setLocale('fr_FR');
                $tacheUtil = $this->get('site.service.taches_utils');
                $task = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ClientsTaches');
                $result = $task->findOneBy([
                    'claId' => $id
                ]);
                if ($result) {

                    $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findBy([ 'usId' => $result->getInsUser() ]);


                    $creation = new \Moment\Moment($result->getInsDate()->format('Y-m-d H:i:s'), 'UTC');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($result->getClaEcheance()->format('Y-m-d H:i:s'), 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => utf8_encode($result->getClaId()),
                        "nom" => utf8_encode($result->getclaNom()),
                        "descr" => utf8_encode($result->getclaDescr()),
                        "user" => utf8_encode($user[0]->getUsPrenom()),
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => utf8_encode($result->getClaStatus())

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
                //Roc-eclerc

                \Moment\Moment::setLocale('fr_FR');
                $tacheUtil = $this->get('site.service.taches_utils');
                $task = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ClientsTaches');
                $result = $task->findOneBy([
                    'claId' => $id
                ]);
                if ($result) {

                    $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findBy([ 'usId' => $result->getInsUser() ]);


                    $creation = new \Moment\Moment($result->getInsDate()->format('Y-m-d H:i:s'), 'UTC');
                    $creationFromNow = $creation->fromNow();
                    $echeance = new \Moment\Moment($result->getClaEcheance()->format('Y-m-d H:i:s'), 'UTC');
                    $echanceFuture = $echeance->calendar();
                    $data = [
                        "id" => utf8_encode($result->getClaId()),
                        "nom" => utf8_encode($result->getclaNom()),
                        "descr" => utf8_encode($result->getclaDescr()),
                        "user" => utf8_encode($user[0]->getUsPrenom()),
                        "creation" => $creationFromNow->getRelative(),
                        "echeance" => $echanceFuture,
                        "idCentrale" => $idCentrale,
                        "statut" => utf8_encode($result->getClaStatus())

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

    public function TerminerTaskAction($id)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "UPDATE CLIENTS_TACHES
                SET
                  CLA_STATUS = 2,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return new Response('taches numero :  ' . $id . ' terminé', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
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

    public function NewTaskAction(Request $request)
    {


        $centrale = $request->query->get('c');


        switch ($centrale) {

            case 'roc':
                $req = $request->request;
                $task = new \RocEclercBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:ActionType')->findAll();
                $clients = $this->getDoctrine()->getManager('roc_eclerc')->getRepository('RocEclercBundle:Clients')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req->get('cla_echeance'));
                    $task
                        ->setClaType($req->get('cla_type'))
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
            case 'funecap':
                $req = $request->request;
                $task = new \FunecapBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:ActionType')->findAll();
                $clients = $this->getDoctrine()->getManager('centrale_funecap')->getRepository('FunecapBundle:Clients')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req->get('cla_echeance'));
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
            case 'ac':

                $req = $request->request;
                $task = new \AchatCentraleBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:ActionType')->findAll();
                $clients = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Clients')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req->get('cla_echeance'));
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
            case 'pfpl':
                $req = $request->request;
                $task = new \PfplBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:ActionType')->findAll();
                $clients = $this->getDoctrine()->getManager('centrale_pascal_leclerc')->getRepository('PfplBundle:Clients')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req->get('cla_echeance'));
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
            case 'gccp':

                $req = $request->request;
                $task = new \GccpBundle\Entity\ClientsTaches();
                $type = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:ActionType')->findAll();
                $clients = $this->getDoctrine()->getManager('centrale_gccp')->getRepository('GccpBundle:Clients')->findAll();
                $user = $this->getDoctrine()->getManager('achat_centrale')->getRepository('AchatCentraleBundle:Users')->findAll();
                if ($request->getMethod() == "POST") {
                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req->get('cla_echeance'));
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


        /**
         * @var \Swift_Mime_Message $message
         */
        $message = \Swift_Message::newInstance()
            ->setSubject('Some Subject')
            ->setFrom('contact@gmail.com')
            ->setTo('jb@achatcentrale.fr')
            ->setBody('SiteBundle:mail:mailDetailClient.html.twig', 'text/html');


        $this->get('mailer')->send($message);

        return $this->render('@Site/test.html.twig');


    }

    public function updateTaskAction(Request $request, $id){ return new Response($id, 222); }


}
