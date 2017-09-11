<?php

namespace SiteBundle\Service;

use Symfony\Component\Templating\EngineInterface;

class Mailer
{
    protected $mailer;
    protected $templating;
    protected $conn;
    private $from = "contact@achatcentrale.fr";
    private $reply = "jb@achatcentrale.fr";
    private $name = "Notification achat-centrale";

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

    public function sendTestMessage()
    {
        $subject = "test mail";
        $template = 'SiteBundle:mail:mailDetailClient.html.twig';
        $to = 'jb@achatcentrale.fr';
        $body = $this->templating->render($template);
        $this->sendMessage($to, $subject, $body);
    }

    public function sendTaskNotification($id,$centrale)
    {


        $sql = "SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $task = $stmt->fetchAll();

        dump($task);

        $subject = "Nouvel tache";
        $template = 'SiteBundle:mail:mailDetailClient.html.twig';
        $to = 'jb@achatcentrale.fr';
        $body = $this->templating->render($template, [
            "nom" => $task
        ]);
        $this->sendMessage($to, $subject, $body);

    }


}