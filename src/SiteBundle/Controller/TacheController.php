<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use Doctrine\ORM\ORMException;
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

        if(!$task){
            throw $this->createNotFoundException('Pas de taches :(');
        }

        $em->remove($task);
        $em->flush();
        return new JsonResponse('ok',200);
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
