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

    public function __construct(Connection $dbalConnection)
    {
        $this->connection = $dbalConnection;
    }


    public function getTheIdForTheStatut($statut)
    {


        switch ($statut) {
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
            "total" => $ac[0]["computed"] + $fun[0]["computed"] + $roc[0]["computed"] + $gccp[0]["computed"] + $pfpl[0]["computed"],
        ];

        return $data;
    }


    public function getCentraleDB($so_id)
    {


        $sqlCentrale = "SELECT SO_DATABASE FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :so_id";
        $stmt = $this->connection->prepare($sqlCentrale);
        $stmt->bindValue('so_id', $so_id);
        $stmt->execute();
        $so_database = $stmt->fetchAll();

        if (!empty($so_database)) {
            return $so_database[0]["SO_DATABASE"];
        } else {
            return new \Exception("Probleme pour trouver la centrale");
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


    public function getTheClientRaisonSoc($id, $centraleId)
    {

        $so_database = $this->getCentraleDB($centraleId);

        $sql = sprintf("SELECT CL_RAISONSOC
                        FROM %s.dbo.CLIENTS
                        WHERE CL_ID = :id ", $so_database);

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0]['CL_RAISONSOC'];


    }


    public function sendNotifNewClientAc($CC_NOM, $CL_MAIL, $CL_TEL, $id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'crm.achatcentrale.fr/notification/new/client/ac/' . $CC_NOM . '/' . $CL_MAIL . '/' . $CL_TEL . '/' . $id . '');
        curl_setopt($ch, CURLOPT_POST, true);

        $response = curl_exec($ch);
    }


    public function getUserName($mailUser)
    {
        $sql = 'SELECT US_PRENOM FROM CENTRALE_ACHAT.dbo.USERS WHERE US_MAIL = :mail';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':mail', $mailUser);
        $stmt->execute();

        return $result[0] = $stmt->fetchAll();
    }

    public function getRefClient($idClient, $centrale)
    {
        $so_database = $this->getCentraleDB($centrale);

        $sql = sprintf("SELECT CL_REF FROM %s.dbo.CLIENTS
                        WHERE CL_ID = :id", $so_database);
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id", $idClient);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {
            dump($result);

            return $result[0]['CL_REF'];
        } else {
            return 'Pas de ref';
        }
    }

    /**
     * @param $length
     * @return string
     * @throws \Exception
     */
    public function generateToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }

        return $token;
    }


    public function getTheEvolution($centrale)
    {

        $so_database = $this->getCentraleDB($centrale);

        $sql = sprintf("SELECT COUNT(*)
                        FROM %s.dbo.CLIENTS
                        WHERE CAST(INS_DATE AS DATE) > DATEADD(M,-3, GETDATE());", $so_database);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $sqlTotal = "SELECT COUNT(*)
                            FROM CENTRALE_ACHAT.dbo.CLIENTS";
        $stmtTotal = $this->connection->prepare($sqlTotal);
        $stmtTotal->execute();
        $resultTotal = $stmtTotal->fetchAll();
        $total = round(($resultTotal[0]['computed'] - $result[0]['computed']) / 100, 0, PHP_ROUND_HALF_UP);
        $data = [
            "total" => $total
        ];
        return $data;

    }

    public function getTheClientGroupe($id, $centraleId)
    {


        $so_database = $this->getCentraleDB($centraleId);

        $sql = sprintf("SELECT *
                        FROM %s.dbo.GROUPE
                        WHERE GR_ID = :id", $so_database);

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result) {

            return $result[0]['GR_DESCR'];

        } else {

            return 'Pas de groupe';
        }


    }


}
