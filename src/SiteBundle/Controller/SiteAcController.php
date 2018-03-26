<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class SiteAcController extends Controller
{
    public function indexAction(Request $request)
    {
        header("Access-Control-Allow-Origin: *");


        if ($request->getMethod() == 'POST') {

            $CL_RAISONSOC = $request->request->get('CL_RAISONSOC');
            $CC_NOM = $request->request->get('CC_NOM');
            $CL_MAIL = $request->request->get('CL_MAIL');
            $CL_TEL = $request->request->get('CL_TEL');
            $token = $this->get('site.service.client_services')->getToken(8);

            $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
            $sql = "BEGIN TRANSACTION
                    INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS (SO_ID, RE_ID, CL_REF,CL_STATUS, CL_RAISONSOC, CL_MAIL, CL_ADHESION , CL_ACTIVITE, CL_PRESCRIPT, CL_TARIF, CL_CLASSIF, INS_DATE, INS_USER, MAJ_DATE, MAJ_USER   )
                    VALUES
                      (1, 1, :ref, 0 , :raison_soc, :mail, 'REGARDE', 0, 0, 0, 0, GETDATE(), 'SITE-AC',GETDATE(), 'SITE-AC' )
                    INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS_USERS (CL_ID, PU_ID, CC_NOM, CC_FONCTION, CC_TEL, CC_PASS, CC_NIVEAU, CC_STATUS, INS_DATE, INS_USER, MAJ_DATE, MAJ_USER)
                    VALUES
                      (scope_identity(), 1, :nom, 'Gérant/Président', :tel, :pass, 1, 0, GETDATE(), 'SITE-AC',GETDATE(), 'SITE-AC' )
                    COMMIT
                ";


            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':raison_soc', $CL_RAISONSOC);
            $stmt->bindValue(':tel', $CL_TEL);
            $stmt->bindValue(':mail', $CL_MAIL);
            $stmt->bindValue(':nom', $CC_NOM);
            $stmt->bindValue(':ref', "AC-" . mt_rand(40000, 99999));
            $stmt->bindValue(':pass', $token);

            $stmt->execute();
            $result = $stmt->fetchAll();


        }

        $urls = [
            "ac" => "http://crm.achatcentrale.fr/notification/new/client/ac/".$CC_NOM."/".$CL_MAIL."/".$CL_TEL."/".$conn->lastInsertId(),
            "client" => "http://crm.achatcentrale.fr/notification/new/client/client/" . $CC_NOM . "/" . $CL_RAISONSOC . "/" . $CL_MAIL . "/" . $CL_TEL . ""
        ];


        return new JsonResponse($urls, 200, [
            'Access-Control-Allow-Origin', '*'
        ]);


    }
}
