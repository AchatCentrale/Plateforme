<?php

namespace AchatCentrale\CrmBundle\Controller;

use AchatCentrale\CrmBundle\AchatCentraleCrmBundle;
use AchatCentrale\CrmBundle\Entity\Clients;
use AchatCentrale\CrmBundle\Entity\ClientsTaches;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class ActionController extends FOSRestController
{
    /**
     * @Rest\Get("/Action")
     */
    public function getAction()
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Get("/Action/{id}")
     */
    public function idAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches')->findBy(array('claId' => $id));
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Post("/Action")
     */
    public function postAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();


        $client = $request->get('cl');
        $client_repo = $em->getRepository('AchatCentraleCrmBundle:Clients')->findBy(['clId' => $client]);
        $data = new ClientsTaches();

        $type = $request->get('type');
        $nom = $request->get('nom');
        $desc = $request->get('description');
        $date_ech = $request->get('date_echeance');
        $priorite = $request->get('priorite');
        $notif_ref = $request->get('notif_ref');

        /*if (empty($type) || empty($nom) || empty($desc) || empty($date_ech)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }*/

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sql = "INSERT INTO
                  CENTRALE_ACHAT_JB.dbo.CLIENTS_TACHES (CL_ID,CLA_DESCR,CLA_NOM,CLA_PRIORITE,CLA_TYPE,CLA_NOTIF_REF,INS_DATE)
                VALUES
                  (:id, :desc, :nom, :priorite, :type, :notif, :date_ins)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue('id', $client_repo[0]->getClId());
        $stmt->bindValue('desc', $desc);
        $stmt->bindValue('nom', $notif_ref);
        $stmt->bindValue('priorite', $priorite);
        $stmt->bindValue('type', $type);
        $stmt->bindValue('notif', $notif_ref);
        //$stmt->bindValue('date_ins', new \DateTime("now"));

        $stmt->execute();

        $restresult = $stmt->fetchAll();

        return new View("Action ajouter", Response::HTTP_OK);
    }


    /**
     * @Rest\Put("/Action/{id}")
     */
    public function updateAction($id, Request $request)
    {
        $ref = $request->get('ref');
        $raison_sociale = $request->get('raison_sociale');
        $siret = $request->get('siret');
        $adresse1 = $request->get('adresse1');


        $sn = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsTaches');


        /** @var $taches ClientsTaches */
        $taches = $repository->find($id);

        if (empty($clients)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        } elseif (!empty($ref) && !empty($raison_sociale) && !empty($siret) && !empty($adresse1)) {

            $clients->setClRef($ref)
                ->setClRaisonsoc($raison_sociale)
                ->setClSiret($siret)
                ->setClAdresse1($adresse1);

            $sn->flush();
            return new View("Utilisateur Updated Successfully", Response::HTTP_OK);
        } else return new View("Impossible de mettre a jour les données", Response::HTTP_NOT_ACCEPTABLE);


    }


    /**
     * @Rest\Delete("/Action/{id}")
     */
    public function deleteAction($id)
    {


        $sn = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients');


        /** @var $taches ClientsTaches */
        $clients = $repository->find($id);


        if (empty($clients)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        } else {
            $sn->remove($clients);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }

}

