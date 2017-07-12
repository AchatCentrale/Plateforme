<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use SiteBundle\Form\ClientsTachesType;
use FunecapBundle\Form\ClientsTachesType as fClientsTachesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class TacheController extends Controller
{


    public function TacheAction()
    {


        $user = $this->getUser();

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT *
                FROM Vue_All_Taches
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

      switch ($idCentrale){

          case 1:
              //roc-eclerc


              \Moment\Moment::setLocale('fr_FR');
              $tacheUtil = $this->get('site.service.taches_utils');
              $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches');
              $result = $task->findOneBy([
                  'claId' => $id
              ]);
              if($result){

                  $user = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Users')->findBy([
                      'usId' => $result->getInsUser()
                  ]);
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
                      "statut" => utf8_encode($result->getClaStatus())

                  ];
                  $response = new JsonResponse($data);
                  $response->headers->set('Content-Type', 'application/json');
                  $response->setStatusCode(200);
                  return $response;
              }else{
                  return new JsonResponse('no taches', 200);
              }



              break;
          case 2:
              //funecap

              \Moment\Moment::setLocale('fr_FR');
              $tacheUtil = $this->get('site.service.taches_utils');
              $task = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:ClientsTaches');
              $result = $task->findOneBy([
                  'claId' => $id
              ]);
              if($result){

                  $user = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Users')->findBy([
                      'usId' => $result->getInsUser()
                  ]);
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
                      "statut" => utf8_encode($result->getClaStatus())

                  ];
                  $response = new JsonResponse($data);
                  $response->headers->set('Content-Type', 'application/json');
                  $response->setStatusCode(200);
                  return $response;
              }else{
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


        switch ($centrale){
            case 'roc':
                $req = $request->request->get('achatcentrale_crmbundle_clientstaches');

                $task = new ClientsTaches();



                if (isset($req['cl'])){




                }

                $form = $this->createForm(ClientsTachesType::class, $task, [
                    'action' => $this->generateUrl('new-task', [ 'c' => $centrale ]),

                ]);

                $form->add('submit', SubmitType::class, [
                        'label' => 'Enregistrer',
                        'attr' => array('class' => 'fluid positive ui button'),]
                );

                if ($request->getMethod() == "POST") {

                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req['claEcheance']);

                    $task
                        ->setClaType($req['claType'])
                        ->setClaNom($req['claNom'])
                        ->setClaDescr($req['claDescr'])
                        ->setClaPriorite($req['claPriorite'])
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req['usId'])
                        ->setInsUser($this->getUser()->getusId());

                    if(isset($client)){
                        $task->setCl($client[0]);
                    }


                    $em = $this->getDoctrine()->getManager();
                    $em->persist($task);
                    $em->flush();


                    return $this->redirectToRoute('taches_home', [

                    ], 301);

                }






                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                'form' => $form->createView(),
                    ]
                );
                break;

            case 'funecap':
                $req = $request->request->get('funecapbundle_clientstaches');

                $task = new \FunecapBundle\Entity\ClientsTaches();


                if (isset($req['cl'])){
                    $client = $this->getDoctrine()->getManager('centrale_funecap_jb')->getRepository('FunecapBundle:Clients')->findBy([
                        'clId' => $req['cl'],
                    ]);

                }

                $form = $this->createForm(fClientsTachesType::class , $task, [
                    'action' => $this->generateUrl('new-task', [ 'c' => $centrale ]),

                ]);

                $form->add('submit', SubmitType::class, [
                        'label' => 'Enregistrer',
                        'attr' => array('class' => 'fluid positive ui button'),]
                );

                if ($request->getMethod() == "POST") {



                    $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $req['claEcheance']);


                    $task
                        ->setClaType($req['claType'])
                        ->setClaNom($req['claNom'])
                        ->setClaDescr($req['claDescr'])
                        ->setClaPriorite($req['claPriorite'])
                        ->setClaEcheance($date_echeance2)
                        ->setUsId($req['usId'])
                        ->setInsUser($this->getUser()->getusId());

                    if(isset($client)){
                        $task->setCl($client[0]);
                    }



                    $em = $this->getDoctrine()->getManager('centrale_funecap_jb');
                    $em->persist($task);
                    $em->flush();



                    return $this->redirectToRoute('taches_home', [

                    ], 301);

                }






                return $this->render(
                    'SiteBundle:ui-element/taches:action.form.html.twig',
                    [
                'form' => $form->createView(),
                    ]
                );
                break;
        }



        return $this->render(
            'SiteBundle:ui-element/taches:action.form.html.twig',
            [
            ]
        );
    }

    public function TaksByIdAction($id)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT *
        FROM CLIENTS_TACHES
        INNER JOIN USERS ON CLIENTS_TACHES.US_ID = USERS.US_ID
        WHERE CLA_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        dump($result);


        return $this->render('@Site/ui-element/taches/taches.by.id.html.twig', [
            'tache' => $result[0]
        ]);
    }

    public function changetheStateAction($state, $id)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "UPDATE CLIENTS_TACHES
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



        return $this->redirectToRoute('taches_home',[] ,301);
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

    public function updateTaskAction(Request $request, $id)
    {
        return new Response($id, 222);
    }


}
