<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use Doctrine\ORM\ORMException;
use SiteBundle\Form\ClientsTachesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TacheController extends Controller
{


    public function TacheAction()
    {
        $user = $this->getUser();

        $task = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy([
            'usId' => $user->getUsId(),
        ]);


        return $this->render('@Site/Base/tache.home.html.twig', [
            'task' => $task,
            'user' => $user->getUsPrenom(),
        ]);
    }


    public function DeleteAction(Request $request, $id)
    {


        $sql = 'DELETE FROM CENTRALE_ACHAT_JB.dbo.CLIENTS_TACHES
                WHERE CLA_ID = ?';



        try{


        $conn = $this->get('database_connection');
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('1', $id);
        $result = $stmt->fetchAll();



        return new Response('remove');
        } catch (ORMException $e){
            $this->get('session')->getFlashBag()->add('error', 'Your custom message');
            // or some shortcut that need to be implemented
            // $this->addFlash('error', 'Custom message');

            // error logging - need customization
            $this->get('logger')->error($e->getMessage());
            //$this->get('logger')->error($e->getTraceAsString());
            // or some shortcut that need to be implemented
            // $this->logError($e);

            // some redirection e. g. to referer
            return $this->redirect($this->getRequest()->headers->get('referer'));
        } catch(\Exception $e){
            // other exceptions
            // flash
            // logger
            // redirection
        }
    }


    public function NewTaskAction(Request $request)
    {

        $req = $request->request->get('achatcentrale_crmbundle_clientstaches');

        dump($req);


        $task = new ClientsTaches();
        $client = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
                'clId' => $req['cl'],
            ]);


        $form = $this->createForm(ClientsTachesType::class, $task, [
                'action' => $this->generateUrl('new-task'),
            ]);


        $form->add('submit', SubmitType::class, array(
                'label' => 'Enregistrer',
                'attr' => array('class' => 'fluid positive ui button'),
            )
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


        }

        return $this->render(
            'SiteBundle:ui-element/taches:action.form.html.twig',
            [
                'form' => $form->createView(),
            ]
        );


    }

}
