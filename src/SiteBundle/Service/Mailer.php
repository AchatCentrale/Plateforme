<?php

namespace SiteBundle\Service;

use Symfony\Component\Templating\EngineInterface;

class Mailer
{
    protected $mailer;
    protected $templating;
    private $from = "contact@achatcentrale.fr";
    private $reply = "jb@achatcentrale.fr";
    private $name = "Notification achat-centrale";

    public function __construct($mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
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

}