<?php


namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;




class NotificationController extends Controller
{


    public function testAction(Request $request)
    {

        $mailer = $this->get('site.service.mailer');

        $mailer->sendTestMail();

        return $this->render('@Site/test.html.twig');

    }

}
