<?php

namespace SiteBundle\Service;

use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\Templating\EngineInterface;

class Mailer
{
    protected $mailer;
    protected $templating;
    protected $conn;
    private $from = "contact@achatcentrale.fr";
    private $reply = "jb@achatcentrale.fr";
    private $name = "Notification achat-centrale 😋";

    public function __construct($mailer, EngineInterface $templating,Connection $dbalConnection )
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->conn = $dbalConnection;

    }

    protected function sendMessage($to, $subject, $body)
    {



        $mail = \Swift_Message::newInstance();


        $mail
            ->setFrom($this->from, $this->name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo($this->reply, $this->name)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }



    public function RelanceTaskNotification($to, $nom, $descr, $insDate, $echeance, $userNom, $userPrenom )
    {
        $subject = "Il reste encore du travail a faire 📚";



        $template = 'SiteBundle:mail:RelanceTaskNotification.html.twig';
        $body = $this->templating->render($template, [
            'nom' => $nom,
            'desc' => $descr,
            'insDate' => $insDate,
            'echeance' => $echeance,
            'userNom' => $userNom,
            'userPrenom' => $userPrenom,
        ]);
        $this->sendMessage($to, $subject, $body);

    }


}