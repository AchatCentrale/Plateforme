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
        $this->setName('cron');

        // On set la description
        $this->setDescription("Liste des commandes pour cron");



        $this->addArgument('type', InputArgument::REQUIRED, "Quel cron executé");

    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $type = $input->getArgument('type');
        $mailer = $this->getContainer()->get('site.service.mailer');


        switch ($type) {

            case 'task':
                $output->writeln("cron executé");

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


                    $result = $mailer->RelanceTaskNotification($t['US_MAIL'], $t['CLA_NOM'], $t['CLA_DESCR'], $t['INS_DATE'], $t['CLA_ECHEANCE'], $t['US_NOM'], $t['US_PRENOM']);


                    $output->write("Normalement c'est envoyé ");

                }


                break;

            case 'test':

                $result = $mailer->sendTestMail();

                $output->write("Normalement c'est envoyé ");
                break;

        }
    }


}