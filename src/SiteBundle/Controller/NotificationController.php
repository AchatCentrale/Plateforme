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





    public function sendNewClientAcAction($name, $mail, $tel, $cl_id, $raisonsoc){


        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');



        $mailer = $this->get('site.service.mailer');
        $mail = $mailer->NewClientNotifAc($name, $mail, $tel, $cl_id, $raisonsoc);

        return new Response('ok', 200);


    }

    public function sendNewClientAcClientAction($nom, $raisonsoc, $mail, $tel)
    {

        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

        $mailer = $this->get('site.service.mailer');
        $mail = $mailer->NewClientNotifClient($nom, $raisonsoc, $mail, $tel);

        return new Response('ok c envoyé', 200);


    }


}
