<?php

namespace SiteBundle\Controller;


use Doctrine\DBAL\DBALException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ConsomnationController extends Controller
{

    public function indexAction(Request $request)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        return $this->render('@Site/Consomnation/index.html.twig');
    }

    public function indexClientAction(Request $request, $id, $centrale)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $clientService = $this->get('site.service.client_services');
        $ref = $clientService->getRefClient($id, $centrale);


        $totalSql = "SELECT sum(CLC_PRIX_PUBLIC) as ca_prix_public, sum(CLC_PRIX_CENTRALE) as ca_prix_centrale FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                    WHERE CC_ID = :id";
        $stmtTotal = $conn->prepare($totalSql);
        $stmtTotal->bindValue(':id', $id);
        $stmtTotal->execute();
        $total = $stmtTotal->fetchAll();


        $tableSql = "SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                        WHERE CC_ID = :ref
                          UNION ALL
                        SELECT 'total',  sum(CLC_PRIX_PUBLIC), round(sum(CLC_PRIX_CENTRALE),2) FROM
                          CENTRALE_ACHAT.dbo.CLIENTS_CONSO
                        WHERE CC_ID = :ref
                        ORDER BY date
                      ";
        $stmtTable = $conn->prepare($tableSql);
        $stmtTable->bindValue(':ref', $id);
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

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        //on cherche tout les fournisseurs
        $sqlListFourn = "SELECT FO_ID FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS";
        $stmtListFourn = $conn->prepare($sqlListFourn);
        $stmtListFourn->execute();
        $listFourn = $stmtListFourn->fetchAll(\PDO::FETCH_COLUMN, 0);


        foreach ($request->files as $file) {

            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, null, "\r")) !== false) {


                    $header = explode(";", $row[0]);

                    for ($i = 0; $i < count($row); $i++) {

                        $ligne = explode(";", $row[$i]);


                        $date = date('Y-d-m', strtotime($ligne[4]));

                        $clientService = $this->get('site.service.client_services');

                        $so_database = $clientService->getCentraleDB($ligne[8]);

                        //import brut
                        //verif si la conso est dans la table

                        $sqlVerif = sprintf("SELECT CLC_ID FROM %s.dbo.CLIENTS_CONSO WHERE CLC_DATE = :date AND FO_ID = :fo_id AND CL_ID = :cl_id", $so_database);

                        $stmtVerif = $conn->prepare($sqlVerif);
                        $stmtVerif->bindValue(':date', $date);
                        $stmtVerif->bindValue(':fo_id', $ligne[7]);
                        $stmtVerif->bindValue(':cl_id', $ligne[0]);
                        $stmtVerif->execute();
                        $resultVerif = $stmtVerif->fetchAll(\PDO::FETCH_COLUMN, 0);
                        if (empty($resultVerif)) {
                            //Il n'y a pas de conso donc insert
                            $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_CONSO (CL_ID, CC_ID, FO_ID, CLC_DATE, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE, INS_DATE, INS_USER)
                                    VALUES
                                (:cl_id, :cc_id, :fo_id, CAST(:date_conso AS DATE), :prix_public, :prix_centrale, GETDATE(), :user)";
                            try {
                                $stmt = $conn->prepare($sql);
                            } catch (DBALException $e) {
                            }
                            $stmt->bindValue(':cl_id', $ligne[0]);
                            $stmt->bindValue(':cc_id', $ligne[1]);
                            $stmt->bindValue(':fo_id', $ligne[7]);
                            $stmt->bindValue(':date_conso', $date);
                            $stmt->bindValue(':prix_public', round($ligne[2]));
                            $stmt->bindValue(':prix_centrale', round($ligne[3]));
                            $stmt->bindValue(':user', $this->getUser()->getUsPrenom());
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                        }

                    }


                }

            }


        }


        $mailer = $this->get('site.service.mailer');
        $mail = $mailer->importConsoClientFinish($this->getUser()->getUsMail());

        return new JsonResponse('Importation réussie', 200);
    }

    public function ConsoDetailAction(Request $request, $id, $centrale)
    {

        header("Access-Control-Allow-Origin: *");


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');
        $so_database = $clientService->getCentraleDB($centrale);

        $start = $request->query->get('start');
        $end = $request->query->get('end');


        if (isset($start) && isset($end)) {
            $totalSql = sprintf("SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_CENTRALE, CLC_PRIX_PUBLIC FROM
                                      %s.dbo.CLIENTS_CONSO
                                    WHERE CC_ID = :if
                                      AND CLC_DATE BETWEEN :start AND :end
                                    UNION ALL
                                    SELECT null,  sum(CLC_PRIX_CENTRALE), round(sum(CLC_PRIX_PUBLIC),2) FROM
                                      %s.dbo.CLIENTS_CONSO
                                    WHERE CC_ID = :if
                                      ORDER BY date ASC", $so_database);


            try {
                $stmtTotal = $conn->prepare($totalSql);
                $stmtTotal->bindValue(':ref', $clientService->getRefClient($id, $centrale));
                $stmtTotal->bindValue(':start', $start);
                $stmtTotal->bindValue(':end', $end);
                $stmtTotal->execute();
            } catch (DBALException $e) {

            }
            $total = $stmtTotal->fetchAll();

            $labels = [];
            $dataset = [];
            foreach ($total as $key => $result) {
                if ($key > 0) {
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


        }

    }

    public function ConsoTableauAction(Request $request, $id, $centrale)
    {
        header("Access-Control-Allow-Origin: *");

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');
        $so_database = $clientService->getCentraleDB($centrale);


        $start = $request->query->get('start');
        $end = $request->query->get('end');


        if (isset($start) && isset($end)) {
            $totalSql = sprintf("SELECT SUBSTRING(CONVERT(VARCHAR(8), CLC_DATE, 3), 4, 5) AS date, CLC_PRIX_PUBLIC, CLC_PRIX_CENTRALE FROM %s.dbo.CLIENTS_CONSO
                                WHERE CF_USER = :ref
                                AND CLC_DATE BETWEEN :start AND :end
                                ORDER BY date
                                  ", $so_database);
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

            foreach ($total as $item => $value) {

                $html .= '<tr><td>' . $value['date'] . '</td><td>' . $value['CLC_PRIX_CENTRALE'] . '</td><td>' . ($value['CLC_PRIX_PUBLIC'] - $value['CLC_PRIX_CENTRALE']) . '</td></tr>';
            }
            $html .= '';


        }
        return new JsonResponse($html, 200);

    }

    public function ConsoCaAction(Request $request, $id, $centrale)
    {

        header("Access-Control-Allow-Origin: *");
        setlocale(LC_MONETARY, "fr_FR");


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $start = $request->query->get('start');
        $end = $request->query->get('end');


        if (isset($start) && isset($end)) {
            $totalSql = sprintf("SELECT sum(CLC_PRIX_CENTRALE) as Total_ca_centrale, sum(CLC_PRIX_PUBLIC) as Total_ca_public, SUM((coalesce(CLC_PRIX_PUBLIC ,0)) - (coalesce(CLC_PRIX_CENTRALE ,0))) as total FROM %s.dbo.CLIENTS_CONSO
                                    WHERE CF_USER = :ref
                                    AND CLC_DATE BETWEEN :start AND :end ", $so_database);
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

    }

    public function refToRaisonSocAction($idClient, $centrale)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("SELECT CL_REF FROM %s.dbo.CLIENTS
                        WHERE CL_ID = :id", $so_database);
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id", $idClient);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            return $result[0]['CL_REF'];
        } else {
            return 'Pas de ref';
        }
    }

    public function checkConsoAction(Request $request)
    {


        $content = $request->query->get('centrale');
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');


        $sql = "SELECT FO_ID ,FO_RAISONSOC FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {

            $array_final = [];

            foreach ($result as $res) {

                $sqlFournisseur = sprintf("SELECT * FROM %s.dbo.CLIENTS_CONSO WHERE FO_ID = :fo_id AND CLC_DATE > DATEADD(month, -2, GETDATE())", $content);
                $stmtFournisseur = $conn->prepare($sqlFournisseur);
                $stmtFournisseur->bindValue(":fo_id", $res["FO_ID"]);
                $stmtFournisseur->execute();
                $resultFournisseur = $stmtFournisseur->fetchAll();


                if (count($resultFournisseur) > 0) {
                    $tpl = [
                        "FO_RAISONSOC" => $res["FO_RAISONSOC"],
                        "status" => true
                    ];

                } else {
                    $tpl = [
                        "FO_RAISONSOC" => $res["FO_RAISONSOC"],
                        "status" => false
                    ];
                }
                array_push($array_final, $tpl);
            }


            return $this->render('@Site/Consomnation/check.html.twig', [
                "fournisseurs" => $array_final,
                "centrale" => $content
            ]);
        } else {
            return 'Probleme';
        }


    }

}


