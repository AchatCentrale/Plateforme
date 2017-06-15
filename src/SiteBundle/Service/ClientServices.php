<?php

namespace SiteBundle\Service;

class ClientServices
{


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




}