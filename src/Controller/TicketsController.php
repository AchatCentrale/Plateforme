<?php

namespace App\Controller;

use App\Security\ApiKeyAuth;
use App\Service\HelperService;
use App\Service\LogHsitory;
use Doctrine\DBAL\Driver\Connection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketsController extends Controller
{
    /**
     * @Route("/ticket/{id}", name="ticket_byId")
     */
    public function ticketsById(Connection $connection, Request $request, HelperService $helper, ApiKeyAuth $auth,LogHsitory $log, $id)
    {

        header("Access-Control-Allow-Origin: *");


        $key = $request->headers->get('X-ac-key');

        if (isset($key) && $auth->grant($key)) {
            $limit = $request->query->get('limit');

            $sql = "
        SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Tickets
        WHERE ME_ID = :id
        ";


            $conn = $connection->prepare($sql);
            $conn->bindValue('id', $id);
            $conn->execute();
            $result = $conn->fetchAll();

            if (!isset($result)) {
                return new JsonResponse("Aucun produit trouvé", 200);

            }
            $data = $helper->array_utf8_encode($result);

            return new JsonResponse($data, 200);
        } else {

            return new JsonResponse("Vous n'avez pas accès a ces ressources", 500);

        }

    }

    /**
     * @Route("/tickets/client/{id}", name="ticket_client")
     */
    public function TicketsByClients(Connection $connection, Request $request, HelperService $helper, ApiKeyAuth $auth,LogHsitory $log, $id)
    {


        header("Access-Control-Allow-Origin: *");


        $key = $request->headers->get('X-ac-key');

        if (isset($key) && $auth->grant($key)) {
            $limit = $request->query->get('limit');

            $sql = "
                    SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Tickets
                    WHERE CL_ID = :id
                    ";


            $conn = $connection->prepare($sql);
            $conn->bindValue('id', $id);
            $conn->execute();
            $result = $conn->fetchAll();

            if (!isset($result)) {
                return new JsonResponse("Aucun produit trouvé", 200);

            }


            $data = $helper->array_utf8_encode($result);



            return new JsonResponse($data, 200);
        } else {

            return new JsonResponse("Vous n'avez pas accès a ces ressources", 500);


        }





    }



    /**
     * @Route("/ticket/new", name="ticket_new")
     */
    public function TicketsNew(Connection $connection, Request $request, HelperService $helper, ApiKeyAuth $auth,LogHsitory $log)
    {


        header("Access-Control-Allow-Origin: *");


        $key = $request->headers->get('X-ac-key');
        $centrale = $request->request->get('centrale');



        $data = [
          "centrale" => $centrale
        ];


//        $sql = "
//                    SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Tickets
//                    WHERE CL_ID = :id
//                    ";
//
//
//        $conn = $connection->prepare($sql);
//        $conn->bindValue('id', $id);
//        $conn->execute();
//        $result = $conn->fetchAll();
//
//        if (!isset($result)) {
//            return new JsonResponse("Aucun produit trouvé", 200);
//
//        }
//
//
//        $data = $helper->array_utf8_encode($result);



        return new JsonResponse($data, 200);








    }



}
