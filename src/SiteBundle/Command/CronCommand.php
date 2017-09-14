<?php

namespace SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronCommand extends ContainerAwareCommand
{

    protected function configure()
    {
// On set le nom de la commande
        $this->setName('app:cron');

// On set la description
        $this->setDescription("Permet juste de faire un test dans la console");

// On set l'aide
        $this->setHelp("Je serai affiche si on lance la commande app/console app:test -h");


        $this->addArgument('type', InputArgument::REQUIRED, "Quel cron executé");

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $type = $input->getArgument('type');
        $mailer = $this->getContainer()->get('site.service.mailer');


        switch ($type){

            case 'task':
                $output->writeln("cron executé");

                $subject = "Il reste encore du travail a faire 📚";

                $mailer = $this->getContainer()->get('site.service.mailer');

                $conn = $this->getContainer()->get('doctrine.dbal.centrale_achat_jb_connection');
                $sql = "SELECT
                      *
                    FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                      INNER JOIN CENTRALE_ACHAT.dbo.USERS ON USERS.US_ID = Vue_All_Taches.US_ID
                    WHERE Vue_All_Taches.CLA_STATUS = 0
                    AND Vue_All_Taches.INS_DATE < GETDATE() - 3";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $task = $stmt->fetchAll();

                foreach ($task as $t) {

                    $template = 'SiteBundle:mail:RelanceTaskNotification.html.twig';
                    $body = $this->getContainer()->get('templating')->render($template, [
                        'nom' => $t['CLA_NOM'],
                        'desc' => $t['CLA_DESCR'],
                        'insDate' => $t['INS_DATE'],
                        'echeance' => $t['CLA_ECHEANCE'],
                        'userNom' => $t['US_NOM'],
                        'userPrenom' => $t['US_PRENOM'],
                    ]);

                    $message = \Swift_Message::newInstance()
                        ->setSubject($subject)
                        ->setFrom('notification@achatcentrale.Fr')
                        ->setTo($t['US_MAIL'])
                        ->setCharset('UTF-8')
                        ->setContentType('text/html')
                        ->setBody($body);



                    $this->getContainer()->get('mailer')->send($message);

                    $output->write("Normalement c'est envoyé ");

                }






                break;

        }



    }
}