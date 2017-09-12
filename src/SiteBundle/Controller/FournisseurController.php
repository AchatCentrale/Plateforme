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

        $sql = "SELECT * FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS WHERE CENTRALE_PRODUITS.dbo.FOURNISSEURS.FO_ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $four = $stmt->fetchAll();


        $sqlUser = "SELECT * FROM CENTRALE_PRODUITS.dbo.FOURN_USERS WHERE FO_ID = :id";

        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bindValue(':id', $id);
        $stmtUser->execute();
        $fourUser = $stmtUser->fetchAll();


        $sqlCountProduit = "SELECT count(*) FROM CENTRALE_PRODUITS.dbo.PRODUITS WHERE FO_ID = :id";
        $stmtCount = $conn->prepare($sqlCountProduit);
        $stmtCount->bindValue(':id', $id);
        $stmtCount->execute();
        $fourCount = $stmtCount->fetchAll();


        if (count($four) > 0){
            return $this->render('@Site/Fournisseurs/general.html.twig', [
                'fournisseur' => $four[0],
                'fournUser' => $fourUser,
                'fournCountProd' => $fourCount,
            ]);
        }else {

            throw new Exception("Il n'y a aucun fournisseur pour cet id", 2);
        }



    }


    public function fournisseurProduitAction(Request $request, $id){

        $req = $request->query->get('c');


        switch ($req){


            case 'all':
            {
                $conn = $this->get('doctrine.dbal.centrale_produits_connection');
                $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_Produits_CRFF WHERE FO_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $produit = $stmt->fetchAll();



                return $this->render(
                    '@Site/Fournisseurs/produits.html.twig',
                    [
                        'produit' => $produit
                    ]
                );
            }
        }



        return $this->render(
            '@Site/Fournisseurs/produits.html.twig',
            [

            ]
        );

    }

}


