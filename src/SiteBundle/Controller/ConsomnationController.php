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

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $sqlTop = "SELECT TOP 3
                      CENTRALE_ACHAT.dbo.CLIENTS_CONSO.CF_USER
                      , round(sum(CENTRALE_ACHAT.dbo.CLIENTS_CONSO.CLC_PRIX_CENTRALE), 1) as ca_centrale
                    FROM  CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                    GROUP BY  CENTRALE_ACHAT.dbo.CLIENTS_CONSO.CF_USER
                    ORDER BY ca_centrale DESC";

        $stmtTop = $conn->prepare($sqlTop);
        $stmtTop->execute();
        $top = $stmtTop->fetchAll();

        $sqlTopEconomie = "SELECT TOP 3
                              CENTRALE_ACHAT.dbo.CLIENTS_CONSO.CF_USER
                              , round(CLIENTS_CONSO.CLC_PRIX_PUBLIC -  CLIENTS_CONSO.CLC_PRIX_CENTRALE, 2) as ca_centrale
                            FROM  CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                            GROUP BY  CENTRALE_ACHAT.dbo.CLIENTS_CONSO.CF_USER, CLIENTS_CONSO.CLC_PRIX_PUBLIC, CLIENTS_CONSO.CLC_PRIX_CENTRALE
                            ORDER BY ca_centrale DESC";

        $stmtTopEconomie = $conn->prepare($sqlTopEconomie);
        $stmtTopEconomie->execute();
        $eco = $stmtTopEconomie->fetchAll();

        $topResult = [];
        foreach ($top as $value){
            $array = [
                "CF_USER" => $clientService->getRefToRaisonSoc($value['CF_USER']),
                "ca_centrale" => $value['ca_centrale']
            ];
            array_push($topResult, $array);
        }

        $ecoResult =[];
        foreach ($eco as $value){

            $array = [
                "CF_USER" => $clientService->getRefToRaisonSoc($value['CF_USER']),
                "ca_centrale" => $value['ca_centrale']
            ];

            array_push($ecoResult, $array);

        }

        $cookie_fourn = [
            'name' => 'Fournisseur', // Nom du cookie
            'value' => 'Bruneau', // Valeur du cookie
        ];

        $cookie_periode = [
            'name' => 'Periode',
            'value' => date("m/Y"),

        ];


        $html = $this->renderView('@Site/Consomnation/index.html.twig', [
            'top' => $topResult,
            'eco' => $ecoResult,
        ]);
        $response = new Response($html);
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


        $tableSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                        WHERE CF_USER = :ref
                          UNION ALL
                        SELECT 'total',  sum(CLC_PRIX_PUBLIC), round(sum(CLC_PRIX_CENTRALE),2) FROM
                          CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                        WHERE CF_USER = :ref
                        ORDER BY date
                      ";
        $stmtTable = $conn->prepare($tableSql);
        $stmtTable->bindValue(':ref', $ref);
        $stmtTable->execute();
        $tableau = $stmtTable->fetchAll();



        return $this->render('@Site/Consomnation/index.client.html.twig', [
            "ca_prix_public" => $total[0]['ca_prix_public'],
            "ca_prix_centrale" => $total[0]['ca_prix_centrale'],
            "ref_client" => $id,
            "tableau" => $tableau
        ]);

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

        header("Access-Control-Allow-Origin: *");


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');


        switch ($centrale){
            case "ACHAT_CENTRALE":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if(isset($start) && isset($end)){
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

                $start = $request->query->get('start');
                $end = $request->query->get('end');

                if(isset($start) && isset($end)){
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
        }

    }

    public function ConsoTableauAction(Request $request, $id, $centrale){
        header("Access-Control-Allow-Origin: *");

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');


        switch ($centrale) {

            case "ACHAT_CENTRALE":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                WHERE CF_USER = :ref
                                AND CLC_DATE BETWEEN :start AND :end
                                ORDER BY date
                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();


                    $html = '';

                    foreach ($total as $item => $value ){

                        $html .= '<tr><td>'.$value['date'].'</td><td>'.$value['CLC_PRIX_CENTRALE'].'</td><td>'.($value['CLC_PRIX_PUBLIC'] - $value['CLC_PRIX_CENTRALE'] ).'</td></tr>';
                    }
                    $html .= '';




                }
                return new JsonResponse($html, 200);
                break;
            case "CENTRALE_FUNECAP":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                WHERE CF_USER = :ref
                                AND CLC_DATE BETWEEN :start AND :end
                                ORDER BY date
                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();


                    $html = '';

                    foreach ($total as $item => $value ){

                        $html .= '<tr><td>'.$value['date'].'</td><td>'.$value['CLC_PRIX_CENTRALE'].'</td><td>'.($value['CLC_PRIX_PUBLIC'] - $value['CLC_PRIX_CENTRALE'] ).'</td></tr>';
                    }
                    $html .= '';




                }
                return new JsonResponse($html, 200);
                break;
            case "CENTRALE_GCCP":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                WHERE CF_USER = :ref
                                AND CLC_DATE BETWEEN :start AND :end
                                ORDER BY date
                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();


                    $html = '';

                    foreach ($total as $item => $value ){

                        $html .= '<tr><td>'.$value['date'].'</td><td>'.$value['CLC_PRIX_CENTRALE'].'</td><td>'.($value['CLC_PRIX_PUBLIC'] - $value['CLC_PRIX_CENTRALE'] ).'</td></tr>';
                    }
                    $html .= '';




                }
                return new JsonResponse($html, 200);
                break;
            case "ROC_ECLERC":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                WHERE CF_USER = :ref
                                AND CLC_DATE BETWEEN :start AND :end
                                ORDER BY date
                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();


                    $html = '';

                    foreach ($total as $item => $value ){

                        $html .= '<tr><td>'.$value['date'].'</td><td>'.$value['CLC_PRIX_CENTRALE'].'</td><td>'.($value['CLC_PRIX_PUBLIC'] - $value['CLC_PRIX_CENTRALE'] ).'</td></tr>';
                    }
                    $html .= '';




                }
                return new JsonResponse($html, 200);
                break;

        }
    }

    public function ConsoCaAction(Request $request, $id, $centrale){

        header("Access-Control-Allow-Origin: *");
        setlocale(LC_MONETARY,"fr_FR");


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');


        switch ($centrale) {

            case "ACHAT_CENTRALE":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT sum(CLC_PRIX_CENTRALE) as Total_ca_centrale, sum(CLC_PRIX_PUBLIC) as Total_ca_public, SUM((coalesce(CLC_PRIX_PUBLIC ,0)) - (coalesce(CLC_PRIX_CENTRALE ,0))) as total FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                    AND CLC_DATE BETWEEN :start AND :end ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();



                    $html = [
                        "Total_ca_centrale" => money_format('%!n &euro;', $total[0]["Total_ca_centrale"]),
                        "Total_ca_public" => money_format('%!n &euro;', $total[0]["Total_ca_public"]),
                        "total" => money_format('%!n &euro;', $total[0]["total"]),

                    ];


                }
                return new JsonResponse($html, 200);
                break;
            case "CENTRALE_FUNECAP":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT sum(CLC_PRIX_CENTRALE) as Total_ca_centrale, sum(CLC_PRIX_PUBLIC) as Total_ca_public, SUM((coalesce(CLC_PRIX_PUBLIC ,0)) - (coalesce(CLC_PRIX_CENTRALE ,0))) as total FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                    AND CLC_DATE BETWEEN :start AND :end
                                                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();



                    $html = [
                        "Total_ca_centrale" => money_format('%!n &euro;', $total[0]["Total_ca_centrale"]),
                        "Total_ca_public" => money_format('%!n &euro;', $total[0]["Total_ca_public"]),
                        "total" => money_format('%!n &euro;', $total[0]["total"]),

                    ];



                }
                return new JsonResponse($html, 200);
                break;
            case "ROC_ECLERC":
                $start = $request->query->get('start');
                $end = $request->query->get('end');


                if (isset($start) && isset($end)) {
                    $totalSql = "SELECT sum(CLC_PRIX_CENTRALE) as Total_ca_centrale, sum(CLC_PRIX_PUBLIC) as Total_ca_public, SUM((coalesce(CLC_PRIX_PUBLIC ,0)) - (coalesce(CLC_PRIX_CENTRALE ,0))) as total FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                    AND CLC_DATE BETWEEN :start AND :end
                                                                  ";
                    try {
                        $stmtTotal = $conn->prepare($totalSql);
                        $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                        $stmtTotal->bindValue(':start', $start);
                        $stmtTotal->bindValue(':end', $end);
                        $stmtTotal->execute();
                    } catch (DBALException $e) {

                    }
                    $total = $stmtTotal->fetchAll();



                    $html = [
                        "Total_ca_centrale" => money_format('%!n &euro;', $total[0]["Total_ca_centrale"]),
                        "Total_ca_public" => money_format('%!n &euro;', $total[0]["Total_ca_public"]),
                        "total" => money_format('%!n &euro;', $total[0]["total"]),

                    ];



                }
                return new JsonResponse($html, 200);
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

    public function refToRaisonSocAction($idClient, $centrale){


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        switch ($centrale) {
            case "ACHAT_CENTRALE":
                $sql = "SELECT CL_REF FROM CENTRALE_ACHAT.dbo.CLIENTS
                        WHERE CL_ID = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $idClient);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result) {


                    return $result[0]['CL_REF'];

                } else {
                    return 'Pas de ref';
                }
                break;
            case "CENTRALE_GCCP":
                $sql = "SELECT CL_REF FROM CENTRALE_GCCP.dbo.CLIENTS
                        WHERE CL_ID = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $idClient);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result) {

                    return $result[0]['CL_REF'];
                } else {
                    return 'Pas de ref';
                }
                break;
            case "CENTRALE_FUNECAP":
                $sql = "SELECT CL_REF FROM CENTRALE_FUNECAP.dbo.CLIENTS
                        WHERE CL_ID = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $idClient);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result) {

                    return $result[0]['CL_REF'];
                } else {
                    return 'Pas de ref';
                }
                break;
            case "CENTRALE_PFPL":
                $sql = "SELECT CL_REF FROM CENTRALE_PFPL.dbo.CLIENTS
                        WHERE CL_ID = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $idClient);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result) {

                    return $result[0]['CL_REF'];
                } else {
                    return 'Pas de ref';
                }
                break;
            case "ROC_ECLERC":
                $sql = "SELECT CL_REF FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
                        WHERE CL_ID = :id";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $idClient);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result) {

                    return $result[0]['CL_REF'];
                } else {
                    return 'Pas de ref';
                }
                break;
        }
    }

}


