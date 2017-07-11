<?php

namespace SiteBundle\Service;

use Doctrine\DBAL\Connection;

class ClientServices
{


    /**
     * @InjectParams({
     *    "em" = @Inject("doctrine.orm.entity_manager")
     * })
     */

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

        $sql = "SELECT count(*) FROM CENTRALE_ACHAT_JB.dbo.CLIENTS";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $roc = $stmt->fetchAll();

        $sql2 = "SELECT count(*) FROM CENTRALE_FUNECAP_JB.dbo.CLIENTS";
        $stmt2 = $this->connection->prepare($sql2);
        $stmt2->execute();

        $fun = $stmt->fetchAll();


        $data = [
            "roc" => $roc[0]["computed"],
            "fun" => $fun[0]["computed"]
        ];

        return $data;




    }

}