<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TacheController extends Controller
{


    public function TacheAction()
    {

        $user = $this->getUser();

        if($user->getUsId() === 2){


            $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

            $sql = "SELECT CL_ID, CLA_STATUS,INS_USER, CLA_ECHEANCE, CLA_DESCR, CLA_PRIORITE, CLA_TYPE, CLA_NOM, CLA_ID, SO_ID, INS_DATE, US_ID
                    FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                    WHERE CLA_STATUS <> 10
                    ORDER BY INS_DATE DESC";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':usId', $user->getUsId());
            $stmt->execute();
            $task = $stmt->fetchAll();



            return $this->render('@Site/Base/tache.home.html.twig', [
                'task' => $task,
            ]);
        }


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "SELECT CL_ID, CLA_STATUS, CLA_ECHEANCE,INS_USER, CLA_DESCR, CLA_PRIORITE, CLA_TYPE, CLA_NOM, CLA_ID, SO_ID, INS_DATE, US_ID
                FROM CENTRALE_ACHAT.dbo.Vue_All_Taches
                WHERE US_ID = :usId
                AND CLA_STATUS <> 10
                ORDER BY INS_DATE DESC";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':usId', $user->getUsId());
        $stmt->execute();
        $task = $stmt->fetchAll();



        $sqlUserDispo = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS";

        $stmtUser = $conn->prepare($sqlUserDispo);
        $stmtUser->execute();
        $user = $stmtUser->fetchAll();

        return $this->render('@Site/Base/tache.home.html.twig', [
            'task' => $task,
            'user' => $user,
        ]);

    }

    public function DetailTaskAction($id, $idCentrale)
    {




        $conn = $this->get('database_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($idCentrale);



        \Moment\Moment::setLocale('fr_FR');
        $sqlTask = sprintf("SELECT * FROM %s.dbo.CLIENTS_TACHES LEFT JOIN %s.dbo.USERS ON %s.dbo.USERS.US_MAIL = %s.dbo.CLIENTS_TACHES.INS_USER WHERE %s.dbo.CLIENTS_TACHES.CLA_ID = :id", $so_database, $so_database, $so_database, $so_database, $so_database);
        $stmt = $conn->prepare($sqlTask);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $resultTask = $stmt->fetchAll();


        if ($resultTask) {
            $creation = new \Moment\Moment($resultTask[0]['INS_DATE'], 'Europe/Berlin');
            $creationFromNow = $creation->fromNow();
            $echeance = new \Moment\Moment($resultTask[0]['CLA_ECHEANCE'], 'UTC');
            $echanceFuture = $echeance->calendar();
            $data = [
                "id" => $resultTask[0]['CLA_ID'],
                "cl_id" => $resultTask[0]['CL_ID'],
                "nom" => $resultTask[0]['CLA_ID'],
                "descr" => $resultTask[0]['CLA_DESCR'],
                "user" => $resultTask[0]['US_PRENOM'],
                "creation" => $creationFromNow->getRelative(),
                "echeance" => $echanceFuture,
                "idCentrale" => $idCentrale,
                "statut" => $resultTask[0]['CLA_STATUS'],
                "centrale" => "ACHAT_CENTRALE",
            ];
            $response = new JsonResponse($data);
            $response->headers->set('Content-Type', 'application/json');
            $response->setStatusCode(200);
            return $response;
        } else {
            return new JsonResponse('no taches', 200);
        }






    }

    public function UnArchiveTaskAction($id){
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $sql = "UPDATE CLIENTS_TACHES
                SET
                  CLA_STATUS = 0,
                  MAJ_DATE = GETDATE()
                WHERE CLA_ID = :id
                ";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $result = $stmt->fetchAll();
        return new Response('taches numero :  ' . $id . ' archivé', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

    public function ArchiveTaskAction($id, $centrale)
    {


        $conn = $this->get('database_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);


        $sql = sprintf("UPDATE %s.dbo.CLIENTS_TACHES
                 SET
                  CLA_STATUS = 10,
                  MAJ_DATE = GETDATE(),
                  MAJ_USER = :user
                WHERE CLA_ID = :id
                ", $so_database);

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':user', $this->getUser()->getUsMail());
        $stmt->execute();
        $result = $stmt->fetchAll();


        $sqlRaisonSoc = sprintf("SELECT CL_ID FROM %s.dbo.CLIENTS_TACHES WHERE CLA_ID = :id", $so_database);

        $stmtRaisonSoc = $conn->prepare($sqlRaisonSoc);
        $stmtRaisonSoc->bindValue(':id', $id);
        $stmtRaisonSoc->execute();
        $resultRaisonSoc = $stmtRaisonSoc->fetchAll();



        return $this->redirectToRoute('client-general',[
            "id" => $resultRaisonSoc[0]["CL_ID"],
            "centrale" => $centrale
        ], 301);




    }

    public function DeleteTaskAction($id, $centrale)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');






        switch ($centrale){
            case "1":
                $sql = "
                    DELETE FROM CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "2":
                $sql = "
                    DELETE FROM CENTRALE_GCCP.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "4":
                $sql = "
                    DELETE FROM CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "5":
                $sql = "
                    DELETE FROM CENTRALE_PFPL.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
            case "6":
                $sql = "
                    DELETE FROM CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                    WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home',[], 301);
        }



    }

    public function NewTaskAction(Request $request)
    {


        $clientChoice = 0;

        $centrale = $request->query->get('c');
        $clientChoice = $request->query->get('cl');
        $mailer = $this->get('site.service.mailer');
        $conn = $this->get('database_connection');
        $req = $request->request;



        $sqlCentrale = "SELECT SO_DATABASE FROM CENTRALE_ACHAT.dbo.SOCIETES
                                    WHERE SO_ID = :so_id";
        $stmt = $conn->prepare($sqlCentrale);
        $stmt->bindValue('so_id', $centrale);
        $stmt->execute();
        $so_database = $stmt->fetchAll();



        $typeSql = sprintf("SELECT * FROM %s.dbo.ACTION_TYPE",$so_database[0]["SO_DATABASE"]);
        $stmt = $conn->prepare($typeSql);
        $stmt->bindValue('so_id', $centrale);
        $stmt->execute();
        $actionType = $stmt->fetchAll();



        if ($request->getMethod() == "POST") {


            $date_echeance2 = \DateTime::createFromFormat('d/m/Y H:i', $req->get('cla_echeance'));

            $sqlAddTask = sprintf("INSERT INTO %s.dbo.CLIENTS_TACHES (CL_ID, US_ID, CLA_TYPE, CLA_NOM, CLA_ECHEANCE, CLA_PRIORITE, CLA_STATUS, INS_DATE, INS_USER) VALUES (:cl_id, :user, :type, :nom, :echeance, :priorite, 0, GETDATE(), :ins_user)", $so_database[0]["SO_DATABASE"]);
            $stmt = $conn->prepare($sqlAddTask);
            $stmt->bindValue('cl_id', $req->get('cla_cl'));
            $stmt->bindValue('user', $this->getUser()->getusId());
            $stmt->bindValue('type', $req->get('cla_type'));
            $stmt->bindValue('nom', $req->get('cla_nom'));
            $stmt->bindValue('echeance', $date_echeance2, \Doctrine\DBAL\Types\Type::DATETIME);
            $stmt->bindValue('priorite', $req->get('cla_priorite'));
            $stmt->bindValue('ins_user', $this->getUser()->getusMail());
            $stmt->execute();
            $last_id = $conn->lastInsertId();

            $NewTask = $stmt->fetchAll();





            //$mailer->sendTaskNotification($last_id, $so_database, $this->getUser());


            return $this->redirectToRoute('taches_home', [

            ], 301);
        }




        return $this->render(
            'SiteBundle:ui-element/taches:action.form.html.twig',
            [
                'type' => $actionType,
                'centrale' => $centrale,
                'client_choice' => $clientChoice
            ]
        );


    }

    public function changetheStateAction($state, $id, $centrale)
    {
        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "2":
                $sql = "UPDATE CENTRALE_GCCP.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "5":
                $sql = "UPDATE CENTRALE_PFPL.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
            case "6":
                $sql = "UPDATE CENTRALE_ROC_ECLERC.dbo.CLIENTS_TACHES
                SET
                  CLA_STATUS = :etat,
                  MAJ_DATE = GETUTCDATE()
                WHERE CLA_ID = :id
                ";

                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->bindValue(':etat', $state);

                $stmt->execute();
                $result = $stmt->fetchAll();


                return $this->redirectToRoute('taches_home', [], 301);
        }
    }

    public function sendMailTaskAction($id)
    {


        $mailer = $this->get('site.service.mailer');





        $mailer->sendTestMessage($id);

        return $this->render('@Site/test.html.twig');


    }

    public function UpdateTaskAction(Request $request, $id, $centrale)
    {

        $conn = $this->get('database_connection');
        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $sqlTask = sprintf("SELECT CLA_NOM, CLA_DESCR, US_ID, CLA_ECHEANCE FROM %s.dbo.CLIENTS_TACHES WHERE CLA_ID = :id", $so_database);
        $stmt = $conn->prepare($sqlTask);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $resultTask = $stmt->fetchAll();

        $sqlUser = "SELECT * FROM CENTRALE_ACHAT.dbo.USERS";

        $stmt = $conn->prepare($sqlUser);
        $stmt->execute();
        $resultUser = $stmt->fetchAll();


        if ($request->getMethod() == "POST") {
            $echeanceNew = $request->get('cla_echeance');
            $nomNew = $request->get('cla_nom');
            $descrNew = $request->get('cla_desc');
            $usNew = $request->get('cla_us');
            $prioriteNew = $request->get('cla_priorite');
            $date_echeance2 = \DateTime::createFromFormat('d/m/Y', $echeanceNew);

            $sqlUpdate = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES
                                  SET
                                    CLA_DESCR = :desc,
                                    CLA_NOM = :nom,
                                    CLA_ECHEANCE = :echeance,
                                    CLA_PRIORITE = :priorite,
                                    MAJ_DATE = GETDATE(),
                                    US_ID = :us,
                                    MAJ_USER = :user                                    
                                  WHERE CLA_ID = :id";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':user', $this->getUser()->getUsMail());
            $stmt->bindValue(':desc', $descrNew);
            $stmt->bindValue(':nom', $nomNew);
            $stmt->bindValue(':us', $usNew);
            $stmt->bindValue(':echeance', $date_echeance2->format('Y-m-d H:i:s'));
            $stmt->bindValue(':priorite', $prioriteNew);
            $stmt->execute();
            $update = $stmt->fetchAll();

            return $this->redirectToRoute('taches_home', [], 301);

        }
        return $this->render('@Site/ui-element/taches/action.form.update.html.twig', [
            'task' => $resultTask,
            'centrale' => $centrale,
            'user' => $resultUser,
            'id' => $id
        ]);


    }

    public function terminerTacheAction(Request $request, $id, $centrale){

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){

            case "ACHAT_CENTRALE":
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_GCCP":
            case "2":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_FUNECAP":
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_PFPL":
            case "5":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');



        }



    }

    public function terminerRdvAction(Request $request, $id, $centrale){

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        switch ($centrale){

            case "ACHAT_CENTRALE":
            case "1":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '30' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_GCCP":
            case "2":
                $sql = "UPDATE CENTRALE_ACHAT.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_FUNECAP":
            case "4":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');
            case "CENTRALE_PFPL":
            case "5":
                $sql = "UPDATE CENTRALE_FUNECAP.dbo.CLIENTS_TACHES SET CLA_STATUS = '20' WHERE CLA_ID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $this->redirectToRoute('taches_home');



        }


    }

    public function changeUserAction(Request $request, $id, $centrale)
    {

        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');

        $so_database = $clientService->getCentraleDB($centrale);

        $text_comment = $request->get('text_comment');
        $user_id = $request->get('user_id');




        $user_maj = $this->getUser()->getusMail();

        $sql =  sprintf("UPDATE %s.dbo.CLIENTS_TACHES
                                SET
                                  US_ID = :user,
                                  CLA_DESCR = :descr,
                                  MAJ_USER = :user_maj,
                                  MAJ_DATE = GETUTCDATE()
                                WHERE CLA_ID = :id", $so_database );


        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':user', $user_id);
        $stmt->bindValue(':descr', $text_comment);
        $stmt->bindValue(':user_maj', $user_maj);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        $result = $stmt->fetchAll();

        return new Response('taches numero :  ' . $id . ' modifier', 200, [
            'Access-Control-Allow-Origin' => '*'
        ]);



    }

}
