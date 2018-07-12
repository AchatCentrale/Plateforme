<?php

namespace SiteBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\StreamedResponse;


class ExportController extends Controller
{

   public function ExportTaskAction(){
       $response = new StreamedResponse();
       $response->setCallback(function(){
           $handle = fopen('php://output', 'w+');
           $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

           fputcsv($handle, ['SO_ID', 'CLA_ID', 'US_ID', 'CLA_NOM', 'CLA_DESCR', 'CLA_ECHEANCE', 'CLA_PRIORITE', 'CLA_STATUS', 'INS_DATE', 'INS_USER', 'MAJ_DATE', 'MAJ_USER' ], ';');

           $sql = "SELECT *  FROM CENTRALE_ACHAT.dbo.Vue_All_Taches";

           $stmt = $conn->prepare($sql);


           $stmt->execute();
           $task = $stmt->fetchAll();
            $ClientService = $this->get('site.service.client_services');

           foreach ($task as $tasks) {
               fputcsv(
                   $handle,
                   [$tasks['SO_ID'], $tasks['CLA_ID'], $tasks['US_ID'], $tasks['CLA_NOM'], $tasks['CLA_DESCR'], $tasks['CLA_ECHEANCE'], $tasks['CLA_PRIORITE'], $tasks['CLA_STATUS'], $tasks['INS_DATE'], $tasks['INS_USER'], $tasks['MAJ_DATE'], $tasks['MAJ_USER']],
                   ';'
               );
           }

           fclose($handle);
       });

       $response->setStatusCode(200);
       $response->headers->set('Content-Type', 'text/csv; charset=windows-1252');
       $response->headers->set('Content-Disposition','attachment; filename="export-action'.date('Y-m-d').'.csv"');

       return $response;
   }

   public function ExportNoteAction(){


       $response = new StreamedResponse();
       $response->setCallback(function(){
           $handle = fopen('php://output', 'w+');
           $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

           $helper = $this->get('site.service.client_services');

           fputcsv($handle, ['SO_ID', 'CN_ID', 'CL_ID', 'CL_RAISONSOC', 'CN_NOTE', 'INS_DATE', 'INS_USER', 'MAJ_DATE', 'MAJ_USER'], ';');

           $sql = "SELECT *  FROM CENTRALE_ACHAT.dbo.Vue_All_Notes";

           $stmt = $conn->prepare($sql);


           $stmt->execute();
           $note = $stmt->fetchAll();
           $ClientService = $this->get('site.service.client_services');

           foreach ($note as $notes) {
               fputcsv(
                   $handle,
                   [$notes['SO_ID'], $notes['CN_ID'], $notes['CL_ID'], $helper->getTheClientRaisonSoc($notes['CL_ID'],$notes['SO_ID'] ) , utf8_encode($notes['CN_NOTE']), $notes['INS_DATE'], $notes['INS_USER'], $notes['MAJ_DATE'], $notes['MAJ_USER']],
                   ';'
               );
           }

           fclose($handle);
       });

       $response->setStatusCode(200);
       $response->headers->set('Content-Type', 'text/csv; charset=windows-1252');
       $response->headers->set('Content-Disposition','attachment; filename="export-note'.date('Y-m-d').'.csv"');

       return $response;

   }

}


