<?php

namespace SiteBundle\Controller;

use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use SiteBundle\Form\ClientsTachesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TacheController extends Controller
{


    public function TacheAction()
    {
        return $this->render('@Site/Base/tache.home.html.twig');
    }


    public function NewTaskAction(Request $request)
    {

        $task = new ClientsTaches();
        $em = $this->getDoctrine()->getManager();


        if($request->get('achatcentrale_crmbundle_clientstaches')){

            dump($request->get('achatcentrale_crmbundle_clientstaches')['claEcheance']);
            $client = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy([
                'clId' =>  $request->get('achatcentrale_crmbundle_clientstaches')['cl']
            ]);

            $task
                ->setClaType($request->get('achatcentrale_crmbundle_clientstaches')['claType'])
                ->setClaNom($request->get('achatcentrale_crmbundle_clientstaches')['claNom'])
                ->setClaDescr($request->get('achatcentrale_crmbundle_clientstaches')['claDescr'])
                ->setClaPriorite($request->get('achatcentrale_crmbundle_clientstaches')['claPriorite'])
                ->setUsId($request->get('achatcentrale_crmbundle_clientstaches')['usId'])
                ->setInsUser($this->getUser());
                ;

            $em->persist($task);
            $em->flush();
        }





        $form = $this->createForm(ClientsTachesType::class, $task, [
            'action' => $this->generateUrl('new-task'),
        ]);




        $form->add('submit', SubmitType::class, array(
            'label' => 'Enregistrer',
            'attr'  => array('class' => 'fluid positive ui button')
        ));






        return $this->render('SiteBundle:ui-element/taches:action.form.html.twig', [
            'form' => $form->createView(),
        ]);



    }

}
