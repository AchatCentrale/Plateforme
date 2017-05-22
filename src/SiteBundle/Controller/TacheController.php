<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use SiteBundle\Form\ClientsTachesType;
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

        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy([
            'usId' => $user->getUsId(),
        ], [
            'insDate' => 'DESC'
        ]);



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

    public function DetailTaskAction($id)
    {


        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches');

        $result = $task->findOneBy([
            'claId' => $id
        ]);

        if($result){
            return new JsonResponse([
                "id" => $result->getClaId(),
                "nom" => $result->getclaNom(),
                "descr" => $result->getclaDescr(),
                "Echeance" => $result->getClaEcheance(),
            ], 200);
        }else{
            return new JsonResponse('no taches', 200);
        }



    }

    public function ArchiveTaskAction($id)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "UPDATE CLIENTS_TACHES
            SET CLA_STATUS = 1
            WHERE CLA_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        dump($result);
        return new Response('taches numero :  ' . $id . ' archivé');
    }

    public function NewTaskAction(Request $request)
    {


        $user = $request->query->get('u');
        dump($user);

        $req = $request->request->get('achatcentrale_crmbundle_clientstaches');

        $task = new ClientsTaches();

        if ($user){
            $task->setUsId($user);
        }


        $client = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
            'clId' => $req['cl'],
        ]);

        $form = $this->createForm(ClientsTachesType::class, $task, [
            'action' => $this->generateUrl('new-task'),
            'us' => $user,
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
                ->setInsUser($this->getUser()->getusId())
                ->setCl($client[0]);


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


}
