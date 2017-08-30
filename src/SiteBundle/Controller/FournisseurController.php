<?php

namespace SiteBundle\Controller;




use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FournisseurController extends Controller
{

    public function indexAction(Request $request)
    {



        $userChoice = $request->query->get('c');
        $centrale = $this->get('site.service.client_services')->getTheCentrale($userChoice);

        switch ($userChoice){

            case "all":
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT FO_ID,FO_REF, FO_RAISONSOC, FO_SIRET, FO_NOM_COM, FO_ADRESSE1, FO_ADRESSE2, FO_CP,
                      FO_VILLE, FO_PAYS, FO_TEL, FO_MAIL, FO_WEB, FO_LOGO, FO_COMM, FO_STATUS
              FROM CENTRALE_ACHAT.dbo.Vue_Regions_Fournisseurs
              '
                );



                $result = $stmt->fetchAll();
                break;
            case 'roc':
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
                );
                $result = $stmt->fetchAll();
                break;
            case 'fun':
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_FUNECAP.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
                );
                $result = $stmt->fetchAll();


                break;
            case 'gccp':
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_GCCP.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
                );
                $result = $stmt->fetchAll();
                break;
            case 'pfpl':
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_PFPL.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
                );
                $result = $stmt->fetchAll();
                break;
            case 'ac':
                $con = $this->getDoctrine()->getManager()->getConnection();
                $stmt = $con->executeQuery(
                    'SELECT DISTINCT
              CL_ID, CL_REF, CL_RAISONSOC, CL_SIRET,CL_CP, CL_VILLE ,
              CL_PAYS, CL_MAIL, CL_WEB, CL_DT_ADHESION, CL_STATUS, CL_ADHESION, INS_DATE, CL_TEL
              FROM CENTRALE_ACHAT.dbo.CLIENTS
              ORDER BY INS_DATE DESC 
              '
                );
                $result = $stmt->fetchAll();
                break;


        }
        return $this->render(
            '@Site/Fournisseurs/index.html.twig',
            [
                "fournisseurs" => $result,
                "centrale" => $centrale
            ]
        );







    }

}


