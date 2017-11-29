<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteAcController extends Controller
{
    public function indexAction(Request $request)
    {

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
            $stmt->bindValue(':ref',mt_rand(40000, 99999));

            $stmt->execute();
            $result = $stmt->fetchAll();

            return $this->render('@Site/test.html.twig');


        }
        return $this->render('@Site/test.html.twig');

    }
}
