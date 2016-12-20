<?php
namespace AchatCentrale\CrmBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle
use AchatCentrale\CrmBundle\Entity\Clients;

class ClientController extends Controller
{


    /**
     * @Rest\View()
     * @Rest\Get("/clients/")
     */
    public function getClientsAction()
    {
        $clients = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AchatCentraleCrmBundle:Clients')
            ->findAll();

        return $clients;

    }



    /**
     * @Rest\View()
     * @Rest\Get("/clients/{id}")
     */
    public function getClientAction($id,Request $request)
    {
        $client = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AchatCentraleCrmBundle:Clients')
            ->find($id);




        if (empty($client)) {
            return new JsonResponse(['error' => 'user not found'], Response::HTTP_NOT_FOUND);
        }



       return $client;
    }



    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/clients/{id}")
     */
    public function removeClientAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $client = $em->getRepository('AchatCentraleCrmBundle:Clients')
            ->find($request->get('id'));

        if ($client) {
            $em->remove($client);
            $em->flush();
        }
    }

}
