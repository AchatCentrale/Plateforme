<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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


            $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
            $sql = "INSERT INTO CENTRALE_ACHAT.dbo.CLIENTS (SO_ID, RE_ID, CL_REF, CL_RAISONSOC,CL_TEL, CL_MAIL, CL_ADHESION , CL_ACTIVITE, CL_PRESCRIPT, CL_TARIF, CL_CLASSIF, INS_DATE, INS_USER, MAJ_DATE, MAJ_USER   )
                    VALUES
                    (1, 1, :ref, :raison_soc, :tel, :mail, 'REGARDE', 0, 0, 0, 0, GETDATE(), 'SITE-AC',GETDATE(), 'SITE-AC' )
                ";




            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':raison_soc', $CL_RAISONSOC);
            $stmt->bindValue(':tel', $CL_TEL);
            $stmt->bindValue(':mail',$CL_MAIL);
            $stmt->bindValue(':ref',"AC-".mt_rand(40000, 99999));

            $stmt->execute();
            $result = $stmt->fetchAll();


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'crm.achatcentrale.fr/notification/new/client/ac/'.$CC_NOM.'/'.$CL_MAIL.'/'.$CL_TEL.'/'.$conn->lastInsertId().'');
            curl_setopt($ch, CURLOPT_POST, true);

            $response = curl_exec($ch);



            return new JsonResponse('ok c\'est enregistrer',200, [
                'Access-Control-Allow-Origin', 'http://crm.achatcentrale.fr'
            ] );


        }
        return new JsonResponse('fail',200 );

    }
}
