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
