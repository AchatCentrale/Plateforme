<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegionsController extends Controller
{
    public function indexAction()
    {
        ini_set('mssql.charset', 'UTF-8');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $sqlListCentrale = "SELECT SO_DATABASE, SO_ID, SO_RAISONSOC FROM CENTRALE_ACHAT.dbo.SOCIETES ORDER BY INS_DATE ASC";

        $stmtCentrale = $conn->prepare($sqlListCentrale);
        $stmtCentrale->execute();
        $result = $stmtCentrale->fetchAll();


        foreach ($result as $id => $res){
            $sqlListRegions = sprintf("SELECT * FROM %s.dbo.REGIONS ORDER BY INS_DATE ASC", $res["SO_DATABASE"]);

            $stmtRegions = $conn->prepare($sqlListRegions);
            $stmtRegions->execute();
            $resultRegions = $stmtRegions->fetchAll();
            array_push($result[$id], $resultRegions);
        }



        return $this->render("@Site/Regions/index.html.twig", [
            "regions" => $result
        ]);
    }


    public function detailRegionAction($centrale, $region_id)
    {


        ini_set('mssql.charset', 'UTF-8');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $sqlListCentrale = "SELECT SO_DATABASE, SO_ID, SO_RAISONSOC FROM CENTRALE_ACHAT.dbo.SOCIETES ORDER BY INS_DATE ASC";

        $stmtCentrale = $conn->prepare($sqlListCentrale);
        $stmtCentrale->execute();
        $result = $stmtCentrale->fetchAll();


        return $this->render("@Site/Regions/detail.html.twig");

    }

    public function importAction()
    {
        return $this->render("@Site/Regions/import.html.twig");
    }

}
