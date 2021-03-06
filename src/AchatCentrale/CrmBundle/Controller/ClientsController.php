<?php

namespace AchatCentrale\CrmBundle\Controller;

use AchatCentrale\CrmBundle\Entity\Clients;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class ClientsController extends FOSRestController
{
    /**
     * @Rest\Get("/Agence")
     */
    public function getAction()
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Get("/Agence/{id}")
     */
    public function idAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients')->findBy(array('clId' => $id));
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Post("/Agence")
     */
    public function postAction(Request $request)
    {
        $data = new Clients();


        $ref = $request->get('ref');
        $raison_sociale = $request->get('raison_sociale');
        $siret = $request->get('siret');
        $adresse1 = $request->get('adresse1');


        if (empty($ref) || empty($raison_sociale) || empty($siret) || empty($adresse1)) {
            return new View("NULL VALUES ARE NOT ALLOWED", Response::HTTP_NOT_ACCEPTABLE);
        }


        $data->setClRef($ref);
        $data->setClRaisonsoc($raison_sociale);
        $data->setClSiret($siret);
        $data->setClAdresse1($adresse1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("Utilisateur Added Successfully", Response::HTTP_OK);
    }


    /**
     * @Rest\Put("/Agence/{id}")
     */
    public function updateAction($id, Request $request)
    {
        $ref = $request->get('ref');
        $raison_sociale = $request->get('raison_sociale');
        $siret = $request->get('siret');
        $adresse1 = $request->get('adresse1');


        $sn = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients');


        /** @var $clients Clients */
        $clients = $repository->find($id);

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
     * @Rest\Delete("/Agence/{id}")
     */
    public function deleteAction($id)
    {


        $sn = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Clients');


        /** @var $clients Clients */
        $clients = $repository->find($id);


        if (empty($clients)) {
            return new View("user not found", Response::HTTP_NOT_FOUND);
        } else {
            $sn->remove($clients);
            $sn->flush();
        }
        return new View("deleted successfully", Response::HTTP_OK);
    }


    /**
     * @Rest\Get("/Agence/{id}/users")
     */
    public function getUserAgenceAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsUsers')->findBy(array('cl' => $id));


        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Get("/Agence/{id}/logs")
     */
    public function getLogsAgenceAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Panier')->findAll();


        $dsn = $this->get('database_connection');

        $restresult = $dsn->fetchAll('
            SELECT TOP
              501 t.*
            FROM
              CENTRALE_ACHAT_JB.dbo.LOGS t
            WHERE
              t.LO_IDENT = \'CL_ID\'
            AND
                t.LO_IDENT_NUM = '.$id . '
          ');




        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }








    /**
     * @Rest\Get("/Agence/{id}/commande")
     */
    public function getTicketCmdAgenceAction($id)
    {
        $db2 = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sql = "SELECT FO_RAISONSOC, COUNT(CE_ID) AS NB_CMD, COUNT(MESSAGE_ENTETE.ME_ID) AS NB_TICKETS
                FROM dbo.MESSAGE_ENTETE
                INNER JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS ON MESSAGE_ENTETE.FO_ID = FOURNISSEURS.FO_ID
                LEFT JOIN dbo.COMMANDE_ENTETE ON MESSAGE_ENTETE.ME_ID = COMMANDE_ENTETE.ME_ID
                WHERE MESSAGE_ENTETE.CL_ID = :id
                GROUP BY FO_RAISONSOC
                ORDER BY NB_TICKETS DESC
        ";


        $stmt = $db2->prepare($sql);

        $stmt->bindValue("id", $id);
        $stmt->execute();

        $restresult = $stmt->fetchAll();


        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }


    /**
     * @Rest\Get("/Agence/{id}/ticket")
     */
    public function getTicketAgenceAction($id)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:Panier')->findAll();


        $dsn = $this->get('database_connection');

        $restresult = $dsn->fetchAll('SELECT TOP 501 t.* FROM dbo.Vue_All_Tickets t');




        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

    /**
     * @Rest\Get("/Agence/{id}/adresse/{type}")
     */
    public function getAdresseAction($id, $type)
    {
        $restresult = $this->getDoctrine()->getRepository('AchatCentraleCrmBundle:ClientsAdresses')->findBy(array(
            "clId" => $id,
            "caType" => $type
        ));


        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }





    /**
     * @Rest\Get("/Agence/count")
     */
    public function getCountAction($id, $type)
    {


        $repository = $this->getDoctrine()
            ->getRepository('AchatCentraleCrmBundle:Clients');


        $count = $repository->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();


        return $count;
    }


}

