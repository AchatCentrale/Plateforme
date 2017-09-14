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

    protected function sendMessageFromCommand($to, $subject, $body)
    {
        $mail = \Swift_Message::newInstance();


        $mail
            ->setFrom($this->from, $this->name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo($this->reply, $this->name)
            ->setContentType('text/html');

        $this->getContainer()->get('mailer')->send($mail);
    }

    public function sendTestMessage()
    {
        $subject = "test mail";
        $template = 'SiteBundle:mail:mail.html.twig';
        $to = 'jb@achatcentrale.fr';
        $body = $this->templating->render($template);
        $this->sendMessage($to, $subject, $body);
    }

    public function sendTaskNotification($id,$centrale)
    {

        $subject = "Nouvelle tâche  📩 ";

       switch ($centrale){
           case "ROC_ECLERC":
               $sql = "SELECT * FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindValue(":id", $id);
               $stmt->execute();
               $task = $stmt->fetchAll();

               $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ";
               $stmtUser = $this->conn->prepare($sqlUser);
               $stmtUser->bindValue(":id", $task[0]['US_ID']);
               $stmtUser->execute();
               $user = $stmtUser->fetchAll();




               $template = 'SiteBundle:mail:mailDetailClient.html.twig';
               $to = $user[0]['US_MAIL'];
               $body = $this->templating->render($template, [
                   'tasks' => $task[0],
                   'user' => $user[0]
               ]);
               $this->sendMessage($to, $subject, $body);
               break;
           case "CENTRALE_FUNECAP":
               $sql = "SELECT * FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindValue(":id", $id);
               $stmt->execute();
               $task = $stmt->fetchAll();

               $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ";
               $stmtUser = $this->conn->prepare($sqlUser);
               $stmtUser->bindValue(":id", $task[0]['US_ID']);
               $stmtUser->execute();
               $user = $stmtUser->fetchAll();




               $template = 'SiteBundle:mail:mailDetailClient.html.twig';
               $to = $user[0]['US_MAIL'];
               $body = $this->templating->render($template, [
                   'tasks' => $task[0],
                   'user' => $user[0]
               ]);
               $this->sendMessage($to, $subject, $body);
               break;
           case "ACHAT_CENTRALE":
               $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindValue(":id", $id);
               $stmt->execute();
               $task = $stmt->fetchAll();

               $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ";
               $stmtUser = $this->conn->prepare($sqlUser);
               $stmtUser->bindValue(":id", $task[0]['US_ID']);
               $stmtUser->execute();
               $user = $stmtUser->fetchAll();




               $template = 'SiteBundle:mail:mailDetailClient.html.twig';
               $to = $user[0]['US_MAIL'];
               $body = $this->templating->render($template, [
                   'tasks' => $task[0],
                   'user' => $user[0]
               ]);
               $this->sendMessage($to, $subject, $body);
               break;
           case "CENTRALE_PFPL":
               $sql = "SELECT * FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindValue(":id", $id);
               $stmt->execute();
               $task = $stmt->fetchAll();

               $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ";
               $stmtUser = $this->conn->prepare($sqlUser);
               $stmtUser->bindValue(":id", $task[0]['US_ID']);
               $stmtUser->execute();
               $user = $stmtUser->fetchAll();




               $template = 'SiteBundle:mail:mailDetailClient.html.twig';
               $to = $user[0]['US_MAIL'];
               $body = $this->templating->render($template, [
                   'tasks' => $task[0],
                   'user' => $user[0]
               ]);
               $this->sendMessage($to, $subject, $body);
               break;
           case "CENTRALE_GCCP":
               $sql = "SELECT * FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ";
               $stmt = $this->conn->prepare($sql);
               $stmt->bindValue(":id", $id);
               $stmt->execute();
               $task = $stmt->fetchAll();

               $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ";
               $stmtUser = $this->conn->prepare($sqlUser);
               $stmtUser->bindValue(":id", $task[0]['US_ID']);
               $stmtUser->execute();
               $user = $stmtUser->fetchAll();




               $template = 'SiteBundle:mail:mailDetailClient.html.twig';
               $to = $user[0]['US_MAIL'];
               $body = $this->templating->render($template, [
                   'tasks' => $task[0],
                   'user' => $user[0]
               ]);
               $this->sendMessage($to, $subject, $body);
               break;
       }

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
        $this->sendMessageFromCommand($to, $subject, $body);

    }


}