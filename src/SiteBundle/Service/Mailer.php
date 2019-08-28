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
    private $reply = "contact@achatcentrale.fr";
    private $name = "Notification achat-centrale";

    public function __construct($mailer, EngineInterface $templating,Connection $dbalConnection )
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->conn = $dbalConnection;

    }

    protected function sendMessage($to, $subject, $body, $name)
    {



        $mail = \Swift_Message::newInstance();


        $mail
            ->setFrom($this->from, $name)
            ->setTo($to)
            ->setSubject($subject)
            ->setBody($body)
            ->setReplyTo($this->reply, $name)
            ->setContentType('text/html');

        $this->mailer->send($mail);
    }


    public function sendTestMail(){
        $this->sendMessage("jb@achatcentrale.fr", "test message mail", "Ceci est un test", "ACHATCENTRALE");
    }


    public function sendTaskNotification($id,$centrale, $user)
    {

        $mailUser = $user->getUsMail();
        $mailPrenom = $user->getUsPrenom();

        $sql = sprintf("SELECT * FROM %s.dbo.CLIENTS_TACHES WHERE CLA_ID = :id ", $centrale[0]["SO_DATABASE"]);
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $task = $stmt->fetchAll();
        $sqlUser = sprintf("SELECT * FROM CENTRALE_ACHAT.dbo.USERS WHERE US_ID = :id ", $centrale);
        $stmtUser = $this->conn->prepare($sqlUser);
        $stmtUser->bindValue(":id", $task[0]['US_ID']);
        $stmtUser->execute();
        $user = $stmtUser->fetchAll();
        $subject = "Nouvelle tache";
        $template = 'SiteBundle:mail:mailDetailClient.html.twig';
        $to = $mailUser;
        $body = $this->templating->render($template, [
            'tasks' => $task[0],
            'userPrenom' => $mailPrenom
        ]);

        $this->sendMessage($to, $subject, $body, "Achat Centrale");


    }


    public function RelanceTaskNotification($to, $nom, $descr, $insDate, $echeance, $userNom, $userPrenom )
    {
        $subject = "TODO : " . $descr ;

        $name = "Notification achat-centrale 😋";

        $template = 'SiteBundle:mail:RelanceTaskNotification.html.twig';
        $body = $this->templating->render($template, [
            'nom' => $nom,
            'desc' => $subject,
            'insDate' => $insDate,
            'echeance' => $echeance,
            'userNom' => $userNom,
            'userPrenom' => $userPrenom,
        ]);
        $this->sendMessage($to, $subject, $body, $name);

    }


    public function RdvRelanceNotification($to, $nom, $descr, $insDate, $echeance, $userNom, $userPrenom)
    {

        $subject = "Vous avez un rendez-vous de prévu ⏱";
        $name = "Notification achat-centrale 😋";


        $template = 'SiteBundle:mail:RdvMailNotification.html.twig';
        $body = $this->templating->render($template, [
            'nom' => $nom,
            'desc' => $descr,
            'insDate' => $insDate,
            'echeance' => $echeance,
            'userNom' => $userNom,
            'userPrenom' => $userPrenom,
        ]);
        $this->sendMessage($to, $subject, $body, $name);

    }


    public function NewClientNotifAc($nom, $email, $tel, $cl_id, $raisonsoc)
    {
        $subject = "Demande d'adhésion 🔥";

        $name = "Notification Achat Centrale 😋";


        $template = 'SiteBundle:mail:NewClientAcNotification.html.twig';
        $body = $this->templating->render($template, [
            'nom' => $nom,
            'mail' => $email,
            'tel' => $tel,
            'cl_id' => $cl_id,
            'raisonsoc' => $raisonsoc

        ]);
        $this->sendMessage("contact@achatcentrale.fr", $subject, $body, $name);

    }

    public function NewClientNotifClient($nom, $raisonsoc, $mail, $tel)
    {
        $subject = $raisonsoc. " - Bienvenue chez Achat Centrale ";

        $name = "ACHAT CENTRALE";

        $template = 'SiteBundle:mail:NewClientAcNotificationClient.html.twig';
        $body = $this->templating->render($template, [
            'nom' => $nom,
            'mail' => $mail,
            'tel' => $tel,
            'raisonsoc' => $raisonsoc

        ]);
        $this->sendMessage($mail, $subject, $body, $name);
    }

    public function importConsoClientFinish($mail)
    {
        $subject = "Le dernier import des consommations est terminé 🚀🚀";

        $name = "Achat Centrale";

        $template = 'SiteBundle:mail:mailAcImportConso.html.twig';
        $body = $this->templating->render($template, []);
        $this->sendMessage($mail, $subject, $body, $name);

    }


}