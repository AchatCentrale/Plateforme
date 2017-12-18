<?php

namespace SiteBundle\Controller;


use DateTime;
use Doctrine\DBAL\DBALException;
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

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $cookie = new Cookie('test', 'test-cookie');

        $clientService = $this->get('site.service.client_services');
        $ref = $clientService->getRefClient($id, $centrale);


        $totalSql = "SELECT sum(CLC_PRIX_PUBLIC) as ca_prix_public, sum(CLC_PRIX_CENTRALE) as ca_prix_centrale FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                    WHERE CF_USER = :ref";


        $stmtTotal = $conn->prepare($totalSql);
        $stmtTotal->bindValue(':ref', $ref);
        $stmtTotal->execute();
        $total = $stmtTotal->fetchAll();




        $response = new Response($this->render('@Site/Consomnation/index.client.html.twig', [
            "ca_prix_public" => $total[0]['ca_prix_public'],
            "ca_prix_centrale" => $total[0]['ca_prix_centrale'],
            "ref_client" => $id

        ]), 200);

        $response->headers->setCookie(new Cookie('fournisseur', 'Bruneau'));

        return $response;

    }

    public function importConsoAction(Request $request)
    {


        $cookie = $request->cookies->get('Fournisseur');
        $periode = $request->cookies->get('Periode');


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');




        foreach ($request->files as $file) {


            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, null, "\r")) !== false) {


                    $header = explode(";", $row[0]);

                    for ($i = 1; $i < count($row); $i++) {

                        $ligne = explode(";", $row[$i]);



                        $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_CONSO (FO_ID, CF_USER, CLC_DATE, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE, INS_DATE, INS_USER) 
    VALUES (:fournisseur, :ref, :date, :prix_public, :prix_centrale, :ins_date, :ins_user)";
                        try {
                            $stmt = $conn->prepare($sql);
                        } catch (DBALException $e) {
                        }


                        $stmt->bindValue(':fournisseur', 2);
                        $stmt->bindValue(':ref', $ligne[0]);
                        $stmt->bindValue(':date', $ligne[4]);
                        $stmt->bindValue(':prix_public', $ligne[2]);
                        $stmt->bindValue(':prix_centrale', $ligne[3]);
                        $stmt->bindValue(':ins_date', date("Y-m-d H:i:s"));
                        $stmt->bindValue(':ins_user', "ADMIN");
                        $stmt->execute();
                        $resultDelete = $stmt->fetchAll();







                    }


                }

            }



        }
        return new JsonResponse('Importation réussie', 200);
    }

    public function ConsoDetailAction(Request $request, $id, $centrale)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');


        switch ($centrale){
            case "ACHAT_CENTRALE":



                $start = $request->query->get('start');
                $send = $request->query->get('send');

                if(isset($start) && isset($send)){
                    $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_CENTRALE, CLC_PRIX_PUBLIC FROM
                                      CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                      AND CLC_DATE BETWEEN :start AND :end
                                    UNION ALL
                                    SELECT null,  sum(CLC_PRIX_CENTRALE), round(sum(CLC_PRIX_PUBLIC),2) FROM
                                      CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                      ORDER BY date ASC";


                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref',$clientService->getRefClient($id, $centrale) );
                        $stmtTotal->bindValue(':start',$start );
                        $stmtTotal->bindValue(':end',$end );
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();

                    $labels = [];
                    $dataset = [];
                    foreach ($total as $key => $result){



                        if ($key > 0){
                            array_push($dataset, $result['CLC_PRIX_PUBLIC']);
                            array_push($labels, $result['date']);

                        }

                    }
                    $data = [
                        'type' => 'line',
                        'title' => 'Title',
                        'labels' => $labels,
                        'datasets' => [
                            [
                                'data' => $dataset,
                                'borderColor' => "#f7464a",
                                'label' => "Bruneau",
                            ]
                        ]

                    ];



                    return new JsonResponse($data, 200);
                    break;

                }

                $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_CENTRALE, CLC_PRIX_PUBLIC FROM
                              CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                            WHERE CF_USER = :ref
                            UNION ALL
                            SELECT null,  sum(CLC_PRIX_CENTRALE), round(sum(CLC_PRIX_PUBLIC),2) FROM
                              CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                            WHERE CF_USER = :ref
                              ORDER BY date ASC";
                try {
                    $stmtTotal = $conn->prepare($totalSql);
                    $stmtTotal->bindValue(':ref',$clientService->getRefClient($id, $centrale) );
                    $stmtTotal->execute();
                } catch (DBALException $e) {

                }
                $total = $stmtTotal->fetchAll();
                $labels = [];
                $dataset = [];
                foreach ($total as $key => $result){



                    if ($key > 0){
                        array_push($dataset, $result['CLC_PRIX_PUBLIC']);
                        array_push($labels, $result['date']);

                    }

                }
                $data = [
                    'type' => 'line',
                    'title' => 'Title',
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'data' => $dataset,
                            'borderColor' => "#f7464a",
                            'label' => "Bruneau",
                        ]
                    ]

                ];
                return new JsonResponse($data, 200);
                break;
            case "CENTRALE_FUNECAP":
                $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_CENTRALE, CLC_PRIX_PUBLIC FROM
                              CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                            WHERE CF_USER = :ref
                            UNION ALL
                            SELECT null,  sum(CLC_PRIX_CENTRALE), round(sum(CLC_PRIX_PUBLIC),2) FROM
                              CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                            WHERE CF_USER = :ref
                              ORDER BY date ASC";



                try {
                    $stmtTotal = $conn->prepare($totalSql);
                    $stmtTotal->bindValue(':ref',$clientService->getRefClient($id, $centrale) );
                    $stmtTotal->execute();
                } catch (DBALException $e) {

                }
                $total = $stmtTotal->fetchAll();

                $labels = [];
                $dataset = [];

                foreach ($total as $key => $result){



                    if ($key > 0){
                        array_push($dataset, $result['CLC_PRIX_PUBLIC']);
                        array_push($labels, $result['date']);

                    }

                }


                $data = [
                    'type' => 'line',
                    'title' => 'Title',
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'data' => $dataset,
                            'borderColor' => "#f7464a",
                            'label' => "Bruneau",
                        ]
                    ]

                ];




                return new JsonResponse($data, 200);
                break;
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


