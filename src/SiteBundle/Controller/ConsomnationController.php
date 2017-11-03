<?php

namespace SiteBundle\Controller;


use DateTime;
use DateTimeZone;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ConsomnationController extends Controller
{


    public function indexAction(Request $request)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sqlConso = "SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO ";
        $stmt = $conn->prepare($sqlConso);
        $stmt->execute();
        $result = $stmt->fetchAll();


        return $this->render(
            '@Site/Consomnation/index.html.twig',
            [
                "conso" => $result,
            ]
        );
    }

    public function indexClientAction(Request $request, $id, $centrale)
    {


        return $this->render(
            '@Site/Consomnation/index.client.html.twig',
            [
            ]
        );
    }

    public function importConsoAction(Request $request)
    {


        foreach ($request->files as $file) {

            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, 10000, "\r")) !== false) {


                    $champ = str_getcsv($row[0]);


                    unset($row[0]);
                    dump($row);



                    for ($i = 1; $i <= count($row); $i++) {

                        $ligne = $row[$i];

                        $ligne = explode(";", $ligne);


                        $date = new DateTime($ligne[4]);
                        $date = $date->format("Y-m-d H:i:s");
                        $prixpublic = floatval(str_replace(',', '.', $ligne[2]));
                        $prixcentral = floatval(str_replace(',', '.', $ligne[3]));

                        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

                        $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_CONSO (FO_ID, CL_ID,CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE, INS_DATE, INS_USER) VALUES (".$ligne[0].", ".$ligne[1].",".$prixpublic.", ".$prixcentral." ,  '".$date."'  , '".$this->getUser(
                            )->getUsPrenom()."' )";


                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();


                        return new JsonResponse('Importation réussie', 200);


                    }

                }
            }
        }


    }

    public function testAction(Request $request)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sqlConso = "SELECT DISTINCT (SELECT CONVERT(VARCHAR(8), a.INS_DATE, 3) AS [MM/DD/YY]) AS date ,sum(a.CLC_PRIX_PUBLIC) AS CA_PUBLIC , sum(a.CLC_PRIX_CENTRALE) AS CA_CENTRALE , b.FO_RAISONSOC
                            FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO a JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS b
                                ON a.FO_ID = b.FO_ID
                            GROUP BY a.INS_DATE, b.FO_RAISONSOC
                            ORDER BY date";

        $stmtConso = $conn->prepare($sqlConso);
        $stmtConso->execute();
        $conso = $stmtConso->fetchAll();

        return new JsonResponse($conso, 200);
    }

}


