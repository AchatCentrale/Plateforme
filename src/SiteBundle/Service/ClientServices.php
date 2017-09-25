<?php

namespace SiteBundle\Service;

use Doctrine\DBAL\Connection;

class ClientServices
{



    /**
     *
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $dbalConnection)  {
        $this->connection = $dbalConnection;
    }

    public function getTheSqlForCentrale($centrale)
    {

        switch ($centrale){
            case "CENTRALE_FUNECAP":
                $sql = 'SELECT DISTINCT
                SO_ID,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION,
                CL_STATUS, CL_ADHESION, GR_DESCR, CL_DESCR, AC_DESCR

                FROM Vue_All_Clients

                WHERE
                  SO_ID = 2';
                return $sql;
            case "CENTRALE_ROC_ECLERC":
                $sql = 'SELECT DISTINCT
                SO_ID,CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION,
                CL_STATUS, CL_ADHESION, GR_DESCR, CL_DESCR, AC_DESCR

                FROM Vue_All_Clients

                WHERE
                  SO_ID = 1';
                return $sql;
        }
    }


    public function getTheIdForTheStatut($statut){


        switch ($statut){
            case "A valider":
                return 0;
                break;
            case 'Validé':
                return 1;
                break;
            case 'Bloqué':
                return 2;
                break;
            default:
                break;
        }



        return $statut;
    }


    public function getTheCount()
    {
        //SELECT count(*) FROM CENTRALE_ACHAT_JB.dbo.CLIENTS
        $data = [];

        $sql = "SELECT count(*) FROM CENTRALE_ACHAT.dbo.CLIENTS";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $ac = $stmt->fetchAll();

        $sql2 = "SELECT count(*) FROM CENTRALE_FUNECAP.dbo.CLIENTS";
        $stmt2 = $this->connection->prepare($sql2);
        $stmt2->execute();
        $fun = $stmt->fetchAll();


        $sql3 = "SELECT count(*) FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS";
        $stmt3 = $this->connection->prepare($sql3);
        $stmt3->execute();
        $roc = $stmt3->fetchAll();


        $sql4 = "SELECT count(*) FROM CENTRALE_GCCP.dbo.CLIENTS";
        $stmt4 = $this->connection->prepare($sql4);
        $stmt4->execute();
        $gccp = $stmt4->fetchAll();

        $sql5 = "SELECT count(*) FROM CENTRALE_PFPL.dbo.CLIENTS";
        $stmt5 = $this->connection->prepare($sql5);
        $stmt5->execute();
        $pfpl = $stmt5->fetchAll();


        $data = [
            "ac" => $ac[0]["computed"],
            "fun" => $fun[0]["computed"],
            "roc" => $roc[0]["computed"],
            "gccp" => $gccp[0]["computed"],
            "pfpl" => $pfpl[0]["computed"],
            "total" => $ac[0]["computed"] + $fun[0]["computed"] + $roc[0]["computed"] + $gccp[0]["computed"] +$pfpl[0]["computed"],
        ];

        return $data;




    }


    public function getTheCentrale($centrale)
    {
        switch ($centrale) {

            case 'all':
                return "all";
                break;
            case 'roc':
                return "ROC_ECLERC";
                break;
            case 'fun':
                return "CENTRALE_FUNECAP";
                break;
            case 'gccp':
                return "CENTRALE_GCCP";
                break;
            case 'pfpl':
                return "CENTRALE_PFPL";
                break;
            case 'ac':
                return "ACHAT_CENTRALE";
                break;




        }
    }


    /**
     * Encode array to utf8 recursively
     * @param $dat
     * @return array|string
     */
    public function array_utf8_encode($dat)
    {
        if (is_string($dat))
            return utf8_encode($dat);
        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = self::array_utf8_encode($d);
        return $ret;
    }

    public function getTheEvolution($centrale)
    {
        switch ($centrale){
            case "1":
                $sql = "SELECT COUNT(*)
                        FROM CENTRALE_ACHAT.dbo.CLIENTS
                        WHERE CAST(INS_DATE AS DATE) > DATEADD(m,-3, GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_ACHAT.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "2":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_GCCP.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_GCCP.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "4":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_FUNECAP.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_FUNECAP.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "5":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_PFPL.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_PFPL.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "6":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => round($total)
                ];


                return $data;
        }


    }

    public function getTheClientRaisonSoc($id, $centraleId){


        switch ($centraleId){
            case "1":
                $sql = "SELECT COUNT(*)
                        FROM CENTRALE_ACHAT.dbo.CLIENTS
                        WHERE CAST(INS_DATE AS DATE) > DATEADD(m,-3, GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_ACHAT.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "2":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_GCCP.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_GCCP.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "4":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_FUNECAP.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_FUNECAP.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "5":
                $sql = "SELECT COUNT(*)
                FROM CENTRALE_PFPL.dbo.CLIENTS
                WHERE CAST(INS_DATE AS DATE) > DATEADD(MONTH,1,GETDATE());";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();


                $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_PFPL.dbo.CLIENTS";

                $stmtTotal = $this->connection->prepare($sqlTotal);
                $stmtTotal->execute();
                $resultTotal = $stmtTotal->fetchAll();

                $total = round( ($resultTotal[0]['computed'] - $result[0]['computed']) / 100 ,  0,PHP_ROUND_HALF_UP );



                $data = [
                    "total" => $total
                ];


                return $data;
            case "6":
                $sql = "SELECT CL_RAISONSOC
                FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
                WHERE CL_ID = :id
                ";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();



                return $result[0]['CL_RAISONSOC'];
        }


        return $id. "  " . $centraleId;
    }

    public function getTheClientGroupe($id, $centraleId){


        switch ($centraleId){
            case "ACHAT_CENTRALE":
                $sql = "SELECT *
                        FROM CENTRALE_ACHAT.dbo.GROUPE
                        WHERE GR_ID = :id";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result){

                    return $result[0]['GR_DESCR'];

                }else{

                    return 'Pas de groupe';
                }            case "CENTRALE_GCCP":
                $sql = "SELECT *
                        FROM CENTRALE_GCCP.dbo.GROUPE
                        WHERE GR_ID = :id";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result){

                    return $result[0]['GR_DESCR'];

                }else{

                    return 'Pas de groupe';
                }            case "CENTRALE_FUNECAP":
                $sql = "SELECT *
                        FROM CENTRALE_FUNECAP.dbo.GROUPE
                        WHERE GR_ID = :id";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result){

                    return $result[0]['GR_DESCR'];

                }else{

                    return 'Pas de groupe';
                }            case "CENTRALE_PFPL":
                $sql = "SELECT *
                        FROM CENTRALE_PFPL.dbo.GROUPE
                        WHERE GR_ID = :id";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                if ($result){

                    return $result[0]['GR_DESCR'];

                }else{

                    return 'Pas de groupe';
                }
            case "ROC_ECLERC":

                $sql = "SELECT *
                        FROM CENTRALE_ROC_ECLERC.dbo.GROUPE
                        WHERE GR_ID = :id";

                $stmt = $this->connection->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
                $result = $stmt->fetchAll();



                if ($result){

                    return $result[0]['GR_DESCR'];

                }else{

                    return 'Pas de groupe';
                }

        }

    }
}