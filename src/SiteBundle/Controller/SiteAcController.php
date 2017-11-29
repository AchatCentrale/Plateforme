<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SiteAcController extends Controller
{
    public function indexAction()
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_All_Taches";

        $stmt = $conn->prepare($sql);
//        $stmt->bindValue(':id', $id);
//        $stmt->bindValue(':centrale', $idCentrale);

        $stmt->execute();
        $result = $stmt->fetchAll();
        dump($result);

        return new Response("ok", 200);
    }
}
