<?php


namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class NotificationController extends Controller
{


    public function testAction(Request $request)
    {

        $mailer = $this->get('site.service.mailer');

        $mailer->sendTestMail();

        return $this->render('@Site/test.html.twig');

    }

    public function sendTaskRelanceAction()
    {

        $mailer = $this->get('site.service.mailer');

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');
        $sql = "SELECT *
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                  LEFT OUTER JOIN CENTRALE_ACHAT.dbo.USERS ON CENTRALE_ACHAT.dbo.USERS.US_ID = Vue_All_Taches.US_ID
                WHERE Vue_All_Taches.CLA_STATUS = 0
                      AND Vue_All_Taches.INS_DATE < GETDATE() - 3";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $task = $stmt->fetchAll();

        foreach ($task as $t) {


            $result = $mailer->RelanceTaskNotification($t['US_MAIL'], $t['CLA_NOM'], $t['CLA_DESCR'], $t['INS_DATE'], $t['CLA_ECHEANCE'], $t['US_NOM'], $t['US_PRENOM']);


        }

        return new Response('ok', 200);


    }


}
