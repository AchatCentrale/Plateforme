<?php

namespace SiteBundle\Controller;


use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ConsomnationController extends Controller
{


    public function indexAction(Request $request)
    {

        $cookie_fourn = [
            'name' => 'Fournisseur', // Nom du cookie
            'value' => 'Bruneau', // Valeur du cookie
        ];

        $cookie_periode = [
            'name' => 'Periode',
            'value' => date("m/Y"),

        ];


        $html = $this->render('@Site/Consomnation/index.html.twig', []);
        $response = new Response($html);
        $response->headers->setCookie(new Cookie($cookie_fourn['name'], $cookie_fourn['value'], time() + (3600 * 48)));
        $response->headers->setCookie(new Cookie($cookie_periode['name'], $cookie_periode['value'], time() + (3600 * 48)));
        return $response;
    }

    public function indexClientAction(Request $request, $id, $centrale)
    {

        $cookie = new Cookie('test', 'test-cookie');


        $response = new Response($this->render('@Site/Consomnation/index.client.html.twig', []), 200);

        $response->headers->setCookie(new Cookie('fournisseur', 'Bruneau'));

        return $response;

    }

    public function importConsoAction(Request $request)
    {


        $j = 0;
        $cookie = $request->cookies->get('Fournisseur');
        $periode = $request->cookies->get('Periode');

        foreach ($request->files as $file) {

            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, 10000, "\n")) !== false) {


                    for ($i = 1; $i <= count($row); $i++) {


                        if ($j > 0) {
                            $ligne = explode(";", $row[0]);

                            dump($ligne);
                            dump($j);
                            dump($periode);


                        $dateNow = new DateTime('now');
                        $dateNow = $dateNow->format("Y-m-d H:i:s");

                        $date = date('d.m.Y H:i:s', str_replace('/', '-', '01/'.$periode));

                        $prixpublic = floatval(str_replace(',', '.', $ligne[1]));
                        $prixcentral = floatval(str_replace(',', '.', $ligne[2]));

                        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

                        $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_CONSO (CF_USER, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE, INS_USER, INS_DATE, CLC_DATE, FO_ID) VALUES (" . $ligne[0] . ", " . $prixpublic . "," . $prixcentral . ", " . $this->getUser()->getUsPrenom() . " ,  '" . $date . "'  , '" . $dateNow . "' )";

                        dump($sql);

//
//                        $stmt = $conn->prepare($sql);
//                        $stmt->execute();
//                        $result = $stmt->fetchAll();
                        }


                    }
                    $j++;
                }
            }

            return new JsonResponse('Importation réussie', 200);


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


