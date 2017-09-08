<?php

namespace SiteBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;


class FournisseurController extends Controller
{

    public function indexAction(Request $request)
    {


        $con = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $con->executeQuery('SELECT *
              FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS');
        $result = $stmt->fetchAll();

        return $this->render(
            '@Site/Fournisseurs/index.html.twig',
            [
                "fournisseurs" => $result,
            ]
        );







    }




    public function fournisseurGeneralAction(Request $request, $id)
    {

        $conn = $this->get('doctrine.dbal.centrale_produits_connection');

        $sql = "SELECT *
                FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS
                WHERE FO_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);


        $stmt->execute();
        $four = $stmt->fetchAll();


        dump($four);




        if (count($four) > 0){
            return $this->render('@Site/Fournisseurs/general.html.twig', [
                'fournisseur' => $four[0]
            ]);
        }else {

            throw new Exception("Il n'y a aucun fournisseur pour cet id", 2);
        }



    }

}


