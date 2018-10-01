<?php

namespace SiteBundle\Controller;


use Doctrine\DBAL\DBALException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class FournisseurController extends Controller
{

    public function indexAction(Request $request)
    {


        $con = $this->getDoctrine()->getManager()->getConnection();
        $stmt = $con->executeQuery(
            'SELECT *
              FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS'
        );
        $result = $stmt->fetchAll();

        return $this->render(
            '@Site/Fournisseurs/index.html.twig',
            [
                "fournisseurs" => $result,
            ]
        );


    }

    public function fournisseurGeneralAction(Request $request, $id)
    {

        $conn = $this->get('doctrine.dbal.centrale_produits_connection');

        $sql = "SELECT * FROM CENTRALE_PRODUITS.dbo.FOURNISSEURS WHERE CENTRALE_PRODUITS.dbo.FOURNISSEURS.FO_ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $four = $stmt->fetchAll();


        $sqlUser = "SELECT * FROM CENTRALE_PRODUITS.dbo.FOURN_USERS WHERE FO_ID = :id";

        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bindValue(':id', $id);
        $stmtUser->execute();
        $fourUser = $stmtUser->fetchAll();


        $sqlCountProduit = "SELECT count(*) FROM CENTRALE_PRODUITS.dbo.PRODUITS WHERE FO_ID = :id";
        $stmtCount = $conn->prepare($sqlCountProduit);
        $stmtCount->bindValue(':id', $id);
        $stmtCount->execute();
        $fourCount = $stmtCount->fetchAll();


        if (count($four) > 0) {
            return $this->render(
                '@Site/Fournisseurs/general.html.twig',
                [
                    'fournisseur' => $four[0],
                    'fournUser' => $fourUser,
                    'fournCountProd' => $fourCount,
                ]
            );
        } else {

            throw new Exception("Il n'y a aucun fournisseur pour cet id", 2);
        }


    }

    public function fournisseurProduitAction(Request $request, $id)
    {

        $req = $request->query->get('c');


        switch ($req) {


            case 'all':
                {
                    $conn = $this->get('doctrine.dbal.centrale_produits_connection');
                    $sql = "SELECT * FROM CENTRALE_ACHAT.dbo.Vue_Produits_CRFF WHERE FO_ID = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $produit = $stmt->fetchAll();

                    return $this->render(
                        '@Site/Fournisseurs/produits.html.twig',
                        [
                            'produit' => $produit,
                            'raisonSoc' => $produit[0]['FO_RAISONSOC'],
                        ]
                    );
                }
        }


        return $this->render(
            '@Site/Fournisseurs/produits.html.twig',
            [

            ]
        );

    }

    public function importProductAction(Request $request)
    {


        return $this->render('@Site/Fournisseurs/import.html.twig');
    }

    public function importProductsAction(Request $request)
    {


        $conn = $this->get('doctrine.dbal.centrale_achat_jb_connection');

        $clientService = $this->get('site.service.client_services');


        foreach ($request->files as $file) {


            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, null, "\r")) !== false) {


                    $header = explode(";", $row[0]);


                    $sqlDelete = "DELETE FROM CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS";
                    $stmtDelete = $conn->prepare($sqlDelete);

                    $stmtDelete->execute();
                    $resultDelete = $stmtDelete->fetchAll();
                    for ($i = 1; $i < count($row); $i++) {


                        $ligne = explode(";", $row[$i]);


                        $descr = iconv("UTF-8", "WINDOWS-1252", $ligne[28]);
                        $triptyque = iconv("UTF-8", "WINDOWS-1252", $ligne[32]);
                        $fournisseur = iconv("UTF-8", "WINDOWS-1252", $ligne[1]);
                        $rayon = iconv("UTF-8", "WINDOWS-1252", $ligne[2]);
                        $famille = iconv("UTF-8", "WINDOWS-1252", $ligne[3]);
                        $filtre1 = iconv("UTF-8", "WINDOWS-1252", $ligne[4]);
                        $valeur1 = iconv("UTF-8", "WINDOWS-1252", $ligne[5]);
                        $filtre2 = iconv("UTF-8", "WINDOWS-1252", $ligne[6]);
                        $valeur2 = iconv("UTF-8", "WINDOWS-1252", $ligne[7]);
                        $filtre3 = iconv("UTF-8", "WINDOWS-1252", $ligne[8]);
                        $valeur3 = iconv("UTF-8", "WINDOWS-1252", $ligne[9]);
                        $filtre4 = iconv("UTF-8", "WINDOWS-1252", $ligne[10]);
                        $valeur4 = iconv("UTF-8", "WINDOWS-1252", $ligne[11]);
                        $filtre5 = iconv("UTF-8", "WINDOWS-1252", $ligne[12]);
                        $valeur5 = iconv("UTF-8", "WINDOWS-1252", $ligne[13]);
                        $filtre6 = iconv("UTF-8", "WINDOWS-1252", $ligne[14]);
                        $valeur6 = iconv("UTF-8", "WINDOWS-1252", $ligne[15]);
                        $filtre7 = iconv("UTF-8", "WINDOWS-1252", $ligne[16]);
                        $valeur7 = iconv("UTF-8", "WINDOWS-1252", $ligne[17]);
                        $filtre8 = iconv("UTF-8", "WINDOWS-1252", $ligne[18]);
                        $valeur8 = iconv("UTF-8", "WINDOWS-1252", $ligne[19]);
                        $filtre9 = iconv("UTF-8", "WINDOWS-1252", $ligne[20]);
                        $valeur9 = iconv("UTF-8", "WINDOWS-1252", $ligne[21]);
                        $filtre10 = iconv("UTF-8", "WINDOWS-1252", $ligne[22]);
                        $valeur10 = iconv("UTF-8", "WINDOWS-1252", $ligne[23]);
                        $refFour = iconv("UTF-8", "WINDOWS-1252", $ligne[24]);
                        $refPart = iconv("UTF-8", "WINDOWS-1252", $ligne[25]);
                        $ean = iconv("UTF-8", "WINDOWS-1252", $ligne[26]);
                        $nomProduit = iconv("UTF-8", "WINDOWS-1252", $ligne[27]);
                        $descrLong = iconv("UTF-8", "WINDOWS-1252", $ligne[29]);
                        $qteCmd = iconv("UTF-8", "WINDOWS-1252", $ligne[33]);
                        $conditionnement = iconv("UTF-8", "WINDOWS-1252", $ligne[34]);
                        $prixPubHt = iconv("UTF-8", "WINDOWS-1252", $ligne[35]);
                        $prixPartHt = iconv("UTF-8", "WINDOWS-1252", $ligne[36]);
                        $prixVc = iconv("UTF-8", "WINDOWS-1252", $ligne[37]);
                        $remise = iconv("UTF-8", "WINDOWS-1252", $ligne[38]);
                        $type = iconv("UTF-8", "WINDOWS-1252", $ligne[30]);
                        $lien = iconv("UTF-8", "WINDOWS-1252", $ligne[31]);
                        $photo = iconv("UTF-8", "WINDOWS-1252", $ligne[39]);



                        switch ($ligne[41]) {
                            case "A RAJOUTER":


                                $sql = "INSERT INTO CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS (PART_ID, Fournisseur, Rayon, Famille, Filtre1, Valeur1, Filtre2, Valeur2, Filtre3, Valeur3, Filtre4, Valeur4, Filtre5, Valeur5, Filtre6, Valeur6, Filtre7, Valeur7, Filtre8, Valeur8, Filtre9, Valeur9, Filtre10, Valeur10, Ref_Fourn, Ref_Part, EAN, Nom_Produit, Descrip_Courte, Descrip_Longue, Triptyque, Qte_Cmde, Conditionnement, Prix_Public_HT, Prix_Part_HT, Prix_VC, Remise_PCT, Type_Lien, Lien, Photo, Variable_Session)
                            VALUES
                              ( :id , :fournisseur ,  :rayon ,  :famille ,  :filtre1 ,  :valeur1 ,  :filtre2 ,  :valeur2 ,  :filtre3 ,  :valeur3 ,  :filtre4 ,  :valeur4 ,  :filtre5 ,  :valeur5 ,  :filtre6 ,  :valeur6 , :filtre7 ,  :valeur7 ,  :filtre8 ,  :valeur8 ,  :filtre9 ,  :valeur9 ,  :filtre10 ,  :valeur10 ,  :refFour ,  :refPart ,  :ean ,  :nomProduit ,  :descrCourte ,  :descrLong ,  :triptyque ,  :qteCmd, :conditionnement, :prixPubHt,  :prixPartHt ,  :prixVc  , :remise ,  :type ,  :lien ,  :photo , 123456  )";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindValue(':id', 1);
                                $stmt->bindValue(':fournisseur', $fournisseur);
                                $stmt->bindValue(':rayon', $rayon);
                                $stmt->bindValue(':famille', $famille);
                                $stmt->bindValue(':filtre1', $filtre1);
                                $stmt->bindValue(':valeur1', $valeur1);
                                $stmt->bindValue(':filtre2', $filtre2);
                                $stmt->bindValue(':valeur2', $valeur2);
                                $stmt->bindValue(':filtre3', $filtre3);
                                $stmt->bindValue(':valeur3', $valeur3);
                                $stmt->bindValue(':filtre4', $filtre4);
                                $stmt->bindValue(':valeur4', $valeur4);
                                $stmt->bindValue(':filtre5', $filtre5);
                                $stmt->bindValue(':valeur5', $valeur5);
                                $stmt->bindValue(':filtre6', $filtre6);
                                $stmt->bindValue(':valeur6', $valeur6);
                                $stmt->bindValue(':filtre7', $filtre7);
                                $stmt->bindValue(':valeur7', $valeur7);
                                $stmt->bindValue(':filtre8', $filtre8);
                                $stmt->bindValue(':valeur8', $valeur8);
                                $stmt->bindValue(':filtre9', $filtre9);
                                $stmt->bindValue(':valeur9', $valeur9);
                                $stmt->bindValue(':filtre10', $filtre10);
                                $stmt->bindValue(':valeur10', $valeur10);
                                $stmt->bindValue(':refFour', $refFour);
                                $stmt->bindValue(':refPart', $refPart);
                                $stmt->bindValue(':ean', $ean);
                                $stmt->bindValue(':nomProduit', $nomProduit);
                                $stmt->bindValue(':descrCourte',$descr);
                                $stmt->bindValue(':descrLong', $descrLong);
                                $stmt->bindValue(':triptyque', $triptyque);
                                $stmt->bindValue(':qteCmd', $qteCmd);
                                $stmt->bindValue(':conditionnement', $conditionnement);
                                $stmt->bindValue(':prixPubHt', $prixPubHt);
                                $stmt->bindValue(':prixPartHt', $prixPartHt);
                                $stmt->bindValue(':prixVc', $prixVc);
                                $stmt->bindValue(':remise', $remise);
                                $stmt->bindValue(':type', $type);
                                $stmt->bindValue(':lien', $lien);
                                $stmt->bindValue(':photo', $photo);
                                $stmt->execute();


                                break;
                            case "A ARCHIVER":


                                $ref = trim($ligne[24]);

                                $sqlUpdate = "UPDATE CENTRALE_PRODUITS.dbo.PRODUITS
                                            SET PR_STATUS = 1
                                            WHERE PR_REF_FRS = :ref";


                                $stmtUpdate = $conn->prepare($sqlUpdate);
                                $stmtUpdate->bindParam(':ref', $ref);
                                try {
                                    $stmtUpdate->execute();
                                } catch (DBALException $e) {
                                    dump($e);
                                }

                                $stmtUpdate->closeCursor();
                                break;
                            case "A MODIFIER":
                                $sql = "INSERT INTO CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS (PART_ID, Fournisseur, Rayon, Famille, Filtre1, Valeur1, Filtre2, Valeur2, Filtre3, Valeur3, Filtre4, Valeur4, Filtre5, Valeur5, Filtre6, Valeur6, Filtre7, Valeur7, Filtre8, Valeur8, Filtre9, Valeur9, Filtre10, Valeur10, Ref_Fourn, Ref_Part, EAN, Nom_Produit, Descrip_Courte, Descrip_Longue, Triptyque, Qte_Cmde, Conditionnement, Prix_Public_HT, Prix_Part_HT, Prix_VC, Remise_PCT, Type_Lien, Lien, Photo, Variable_Session)
                            VALUES
                              ( :id , :fournisseur ,  :rayon ,  :famille ,  :filtre1 ,  :valeur1 ,  :filtre2 ,  :valeur2 ,  :filtre3 ,  :valeur3 ,  :filtre4 ,  :valeur4 ,  :filtre5 ,  :valeur5 ,  :filtre6 ,  :valeur6 , :filtre7 ,  :valeur7 ,  :filtre8 ,  :valeur8 ,  :filtre9 ,  :valeur9 ,  :filtre10 ,  :valeur10 ,  :refFour ,  :refPart ,  :ean ,  :nomProduit ,  :descrCourte ,  :descrLong ,  :triptyque ,  :qteCmd, :conditionnement, :prixPubHt,  :prixPartHt ,  :prixVc  , :remise ,  :type ,  :lien ,  :photo , 123456  )";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindValue(':id', 1);
                                $stmt->bindValue(':fournisseur', $ligne[1]);
                                $stmt->bindValue(':rayon', $ligne[2]);
                                $stmt->bindValue(':famille', $ligne[3]);
                                $stmt->bindValue(':filtre1', $ligne[4]);
                                $stmt->bindValue(':valeur1', $ligne[5]);
                                $stmt->bindValue(':filtre2', $ligne[6]);
                                $stmt->bindValue(':valeur2', $ligne[7]);
                                $stmt->bindValue(':filtre3', $ligne[8]);
                                $stmt->bindValue(':valeur3', $ligne[9]);
                                $stmt->bindValue(':filtre4', $ligne[10]);
                                $stmt->bindValue(':valeur4', $ligne[11]);
                                $stmt->bindValue(':filtre5', $ligne[12]);
                                $stmt->bindValue(':valeur5', $ligne[13]);
                                $stmt->bindValue(':filtre6', $ligne[14]);
                                $stmt->bindValue(':valeur6', $ligne[15]);
                                $stmt->bindValue(':filtre7', $ligne[16]);
                                $stmt->bindValue(':valeur7', $ligne[17]);
                                $stmt->bindValue(':filtre8', $ligne[18]);
                                $stmt->bindValue(':valeur8', $ligne[19]);
                                $stmt->bindValue(':filtre9', $ligne[20]);
                                $stmt->bindValue(':valeur9', $ligne[21]);
                                $stmt->bindValue(':filtre10', $ligne[22]);
                                $stmt->bindValue(':valeur10', $ligne[23]);
                                $stmt->bindValue(':refFour', $ligne[24]);
                                $stmt->bindValue(':refPart', $ligne[25]);
                                $stmt->bindValue(':ean', $ligne[26]);
                                $stmt->bindValue(':nomProduit', $ligne[27]);
                                $stmt->bindValue(':descrCourte', $ligne[28]);
                                $stmt->bindValue(':descrLong', $ligne[29]);
                                $stmt->bindValue(':triptyque', $ligne[32]);
                                $stmt->bindValue(':qteCmd', $ligne[33]);
                                $stmt->bindValue(':conditionnement', $ligne[34]);
                                $stmt->bindValue(':prixPubHt', $ligne[35]);
                                $stmt->bindValue(':prixPartHt', $ligne[36]);
                                $stmt->bindValue(':prixVc', $ligne[37]);
                                $stmt->bindValue(':remise', $ligne[38]);
                                $stmt->bindValue(':type', $ligne[30]);
                                $stmt->bindValue(':lien', $ligne[31]);
                                $stmt->bindValue(':photo', $ligne[40]);
                                $stmt->execute();


                                break;


                                break;


                        }


                    }


                }

            }
        }

        return new JsonResponse('Importation réussie', 200);
    }

    public function checkBarcodeAction(Request $request)
    {

        $conn = $this->get('doctrine.dbal.centrale_produits_connection');

        $sql = 'SELECT
                  PR_ID,
                  FO_RAISONSOC,
                  PR_REF,
                  PR_NOM,
                  PR_STATUS,
                  PR_EAN
                FROM CENTRALE_PRODUITS.dbo.PRODUITS
                  INNER JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS ON PRODUITS.FO_ID = FOURNISSEURS.FO_ID
                WHERE PR_EAN LIKE \'%E%\' AND LEN(PR_EAN) > 0';

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();



        $sqlTwo = 'SELECT
                  PR_ID,
                  FO_RAISONSOC,
                  PR_REF,
                  PR_NOM,
                  PR_STATUS,
                  PR_EAN
                FROM CENTRALE_PRODUITS.dbo.PRODUITS
                  INNER JOIN CENTRALE_PRODUITS.dbo.FOURNISSEURS ON PRODUITS.FO_ID = FOURNISSEURS.FO_ID
                WHERE PR_EAN NOT LIKE \'%E%\' AND LEN(PR_EAN) = 13';

        $stmtTwo = $conn->prepare($sqlTwo);
        $stmtTwo->execute();
        $resultTwo = $stmtTwo->fetchAll();


        return $this->render(
            '@Site/Fournisseurs/checkBarcode.html.twig',
            [
                'products' => $resultTwo,
                'productsScien' => $result,
            ]
        );

    }


}


