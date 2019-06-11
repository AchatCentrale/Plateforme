<?php

namespace SiteBundle\Controller;


use Doctrine\DBAL\DBALException;
use ForceUTF8\Encoding;
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
        ini_set('auto_detect_line_endings',TRUE);


        $replace = $this->get("site.service.bddservices");


        $data = [];


        foreach ($request->files as $file) {

            if (($handle = fopen($file->getRealPath(), "r")) !== false) {
                while (($row = fgetcsv($handle, null, "\r")) !== false) {

                    array_push($data, $row);

                    $header = explode(";", $row[0]);



                    $sqlDelete = "DELETE FROM CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS";
                    $stmtDelete = $conn->prepare($sqlDelete);

                    $stmtDelete->execute();
                }
            }
        }





        for ($i = 1; $i < count($data); $i++){
            $ligne = explode(";", $data[$i][0]);


            $fournisseur = empty($ligne[1]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[1]);
            $rayon = empty($ligne[2]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[2]);
            $famille = empty($ligne[3]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[3]);
            $filtre1 = empty($ligne[4]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[4]);
            $valeur1 = empty($ligne[5]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[5]);
            $filtre2 = empty($ligne[6]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[6]);
            $valeur2 = empty($ligne[7]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[7]);
            $filtre3 = empty($ligne[8]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[8]);
            $valeur3 = empty($ligne[9]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[9]);
            $filtre4 = empty($ligne[10]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[10]);
            $valeur4 = empty($ligne[11]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[11]);
            $filtre5 = empty($ligne[12]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[12]);
            $valeur5 = empty($ligne[13]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[13]);
            $filtre6 = empty($ligne[14]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[14]);
            $valeur6 = empty($ligne[15]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[15]);
            $filtre7 = empty($ligne[16]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[16]);
            $valeur7 = empty($ligne[17]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[17]);
            $filtre8 = empty($ligne[18]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[18]);
            $valeur8 = empty($ligne[19]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[19]);
            $filtre9 = empty($ligne[20]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[20]);
            $valeur9 = empty($ligne[21]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[21]);
            $filtre10 = empty($ligne[22]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[22]);
            $valeur10 = empty($ligne[23]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[23]);
            $type_produit = empty($ligne[24]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[24]);
            $ref_parent = empty($ligne[25]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[25]);
            $code_maitre = empty($ligne[26]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[26]);
            $vte_addi = empty($ligne[27]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[27]);
            $ref_fourn = empty($ligne[28]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[28]);
            $ref_ac = empty($ligne[29]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[29]);
            $ean = empty($ligne[30]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[30]);
            $produit = empty($ligne[31]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[31]);
            $descr_courte = empty($ligne[32]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[32]);
            $descr_longue = empty($ligne[33]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[33]);
            $detail_prod = empty($ligne[34]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[34]);
            $info_frs = empty($ligne[35]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[35]);
            $type_lien = empty($ligne[36]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[36]);
            $lien = empty($ligne[37]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[37]);
            $triptyque = empty($ligne[38]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[38]);
            $quantite = empty($ligne[39]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[39]);
            $conditionnement = empty($ligne[40]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[40]);
            $delai_livraison = empty($ligne[41]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[41]);
            $no_serie = empty($ligne[42]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[42]);
            $prix_net = empty($ligne[43]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[43]);
            $prix_public = empty($ligne[44]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[44]);
            $prix_ca_1 = empty($ligne[45]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[45]);
            $prix_vc_1 = empty($ligne[46]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[46]);
            $prix_ca_2 = empty($ligne[47]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[47]);
            $prix_vc_2 = empty($ligne[48]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[48]);
            $prix_ca_3 = empty($ligne[49]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[49]);
            $prix_vc_3 = empty($ligne[50]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[50]);
            $prix_ca_4 = empty($ligne[51]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[51]);
            $prix_vc_4 = empty($ligne[52]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[52]);
            $prix_ca_5 = empty($ligne[53]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[53]);
            $prix_vc_5 = empty($ligne[54]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[54]);
            $degres_qte_1 = empty($ligne[55]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[55]);
            $degres_prix_1 = empty($ligne[56]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[56]);
            $degres_qte_2 = empty($ligne[57]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[57]);
            $degres_prix_2 = empty($ligne[58]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[58]);
            $degres_qte_3 = empty($ligne[59]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[59]);
            $degres_prix_3 = empty($ligne[60]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[60]);
            $degres_qte_4 = empty($ligne[61]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[61]);
            $degres_prix_4 = empty($ligne[62]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[62]);
            $degres_qte_5 = empty($ligne[63]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[63]);
            $degres_prix_5 = empty($ligne[64]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[64]);
            $degres_qte_6 = empty($ligne[65]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[65]);
            $degres_prix_6 = empty($ligne[66]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[66]);
            $degres_qte_7 = empty($ligne[67]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[67]);
            $degres_prix_7 = empty($ligne[68]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[68]);
            $degres_qte_8 = empty($ligne[69]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[69]);
            $degres_prix_8 = empty($ligne[70]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[70]);
            $degres_qte_9 = empty($ligne[71]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[71]);
            $degres_prix_9 = empty($ligne[72]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[72]);
            $degres_qte_10 = empty($ligne[73]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[73]);
            $degres_prix_10 = empty($ligne[74]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[74]);
            $remise = empty($ligne[75]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[75]);
            $photo = empty($ligne[76]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[76]);
            $photo_2 = empty($ligne[77]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[77]);
            $photo_3 = empty($ligne[78]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[78]);
            $pdf_txt_1 = empty($ligne[79]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[79]);
            $pdf_lien_1 = empty($ligne[80]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[80]);
            $pdf_txt_2 = empty($ligne[81]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[81]);
            $pdf_lien_2 = empty($ligne[82]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[82]);
            $pdf_txt_3 = empty($ligne[83]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[83]);
            $pdf_lien_3 = empty($ligne[84]) ? " " : iconv("UTF-8", "WINDOWS-1252", $ligne[84]);





            ini_set('auto_detect_line_endings',FALSE);


            if (!empty($ligne[88])){


                switch ($ligne[88]) {
                    case "A RAJOUTER":


                        $sql = "INSERT INTO CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS
                                    (PART_ID, Fournisseur, Rayon, Famille, Filtre1, Valeur1, Filtre2, Valeur2, Filtre3, Valeur3, Filtre4, Valeur4, Filtre5, Valeur5, Filtre6, Valeur6, Filtre7, Valeur7, Filtre8, Valeur8, Filtre9, Valeur9, Filtre10, Valeur10, Type_Prod, Ref_Parent, Code_Maitre, Vte_Addi, Ref_Part, Ref_Fourn, EAN, Nom_Produit, Descrip_Courte, Descrip_Longue, Detail_Prod, Info_Frs, Triptyque, No_Serie, Delais_Liv, Qte_Cmde, Conditionnement, Prix_Net, Prix_Public_HT, Prix_CA_1, Prix_VC_1, Prix_CA_2, Prix_VC_2, Prix_CA_3, Prix_VC_3, Prix_CA_4, Prix_VC_4, Prix_CA_5, Prix_VC_5, Degres_Qte_1, Degres_Prix_1, Degres_Qte_2, Degres_Prix_2, Degres_Qte_3, Degres_Prix_3, Degres_Qte_4, Degres_Prix_4, Degres_Qte_5, Degres_Prix_5, Degres_Qte_6, Degres_Prix_6, Degres_Qte_7, Degres_Prix_7, Degres_Qte_8, Degres_Prix_8, Degres_Qte_9, Degres_Prix_9, Degres_Qte_10, Degres_Prix_10, Remise_PCT, Type_Lien, Lien, Photo1, Photo2, Photo3, PDF_Txt_1, PDF_Lien_1, PDF_Txt_2, PDF_Lien_2, PDF_Txt_3, PDF_Lien_3, Variable_Session)
                                        VALUES
                                    (1, :fournisseur, :rayon, :famille, :filtre1, :valeur1, :filtre2, :valeur2, :filtre3, :valeur3, :filtre4, :valeur4, :filtre5, :valeur5, :filtre6, :valeur6, :filtre7, :valeur7, :filtre8, :valeur8, :filtre9, :valeur9, :filtre10, :valeur10, :type_prod, :ref_parent, :code_maitre, :vte_addi, :ref_part, :ref_fourn, :ean, :nom, :descr_courte, :descr_longue, :detail_prod, :info_fourn, :triptyque, :no_serie, :delais_liv, :qte_cmd, :conditionnement, :prix_net, :prix_public_ht, :prix_ca_1, :prix_vc_1, :prix_ca_2, :prix_vc_2,:prix_ca_3, :prix_vc_3, :prix_ca_4, :prix_vc_4, :prix_ca_5, :prix_vc_5, :degres_qte_1, :degres_prix_1, :degres_qte_2, :degres_prix_2, :degres_qte_3, :degres_prix_3, :degres_qte_4, :degres_prix_4, :degres_qte_5, :degres_prix_5, :degres_qte_6, :degres_prix_6, :degres_qte_7, :degres_prix_7, :degres_qte_8, :degres_prix_8, :degres_qte_9, :degres_prix_9, :degres_qte_10, :degres_prix_10, :remise, :type_lien, :lien, :photo_1, :photo_2, :photo_3, :pdf_txt_1, :pdf_lien_1, :pdf_txt_2, :pdf_lien_2, :pdf_txt_3, :pdf_lien_3, 123456)";

                        $stmt = $conn->prepare($sql);
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
                        $stmt->bindValue(':type_prod', $type_produit);
                        $stmt->bindValue(':ref_parent', strtoupper($ref_parent));
                        $stmt->bindValue(':code_maitre', strtoupper($code_maitre));
                        $stmt->bindValue(':vte_addi', $vte_addi);
                        $stmt->bindValue(':ref_part', strtoupper($ref_ac));
                        $stmt->bindValue(':ref_fourn', strtoupper($ref_fourn));
                        $stmt->bindValue(':ean', $ean);
                        $stmt->bindValue(':nom', $produit);
                        $stmt->bindValue(':descr_courte', Encoding::UTF8FixWin1252Chars($descr_courte));
                        $stmt->bindValue(':descr_longue', Encoding::UTF8FixWin1252Chars($descr_longue));
                        $stmt->bindValue(':detail_prod', $detail_prod);
                        $stmt->bindValue(':info_fourn', $info_frs);
                        $stmt->bindValue(':triptyque', $triptyque);
                        $stmt->bindValue(':no_serie', $no_serie);
                        $stmt->bindValue(':delais_liv', $delai_livraison);
                        $stmt->bindValue(':qte_cmd', $quantite);
                        $stmt->bindValue(':conditionnement', $conditionnement);
                        $stmt->bindValue(':prix_net', $prix_net);
                        $stmt->bindValue(':prix_public_ht', $prix_public);
                        $stmt->bindValue(':prix_ca_1', $prix_ca_1);
                        $stmt->bindValue(':prix_vc_1', $prix_vc_1);
                        $stmt->bindValue(':prix_ca_2', $prix_ca_2);
                        $stmt->bindValue(':prix_vc_2', $prix_vc_2);
                        $stmt->bindValue(':prix_ca_3', $prix_ca_3);
                        $stmt->bindValue(':prix_vc_3', $prix_vc_3);
                        $stmt->bindValue(':prix_ca_4', $prix_ca_4);
                        $stmt->bindValue(':prix_vc_4', $prix_vc_4);
                        $stmt->bindValue(':prix_ca_5', $prix_ca_5);
                        $stmt->bindValue(':prix_vc_5', $prix_vc_5);
                        $stmt->bindValue(':degres_qte_1', $degres_qte_1);
                        $stmt->bindValue(':degres_prix_1', $degres_prix_1);
                        $stmt->bindValue(':degres_qte_2', $degres_qte_2);
                        $stmt->bindValue(':degres_prix_2', $degres_prix_2);
                        $stmt->bindValue(':degres_qte_3', $degres_qte_3);
                        $stmt->bindValue(':degres_prix_3', $degres_prix_3);
                        $stmt->bindValue(':degres_qte_4', $degres_qte_4);
                        $stmt->bindValue(':degres_prix_4', $degres_prix_4);
                        $stmt->bindValue(':degres_qte_5', $degres_qte_5);
                        $stmt->bindValue(':degres_prix_5', $degres_prix_5);
                        $stmt->bindValue(':degres_qte_6', $degres_qte_6);
                        $stmt->bindValue(':degres_prix_6', $degres_prix_6);
                        $stmt->bindValue(':degres_qte_7', $degres_qte_7);
                        $stmt->bindValue(':degres_prix_7', $degres_prix_7);
                        $stmt->bindValue(':degres_qte_8', $degres_qte_8);
                        $stmt->bindValue(':degres_prix_8', $degres_prix_8);
                        $stmt->bindValue(':degres_qte_9', $degres_qte_9);
                        $stmt->bindValue(':degres_prix_9', $degres_prix_9);
                        $stmt->bindValue(':degres_qte_10', $degres_qte_10);
                        $stmt->bindValue(':degres_prix_10', $degres_prix_10);
                        $stmt->bindValue(':remise', $remise);
                        $stmt->bindValue(':type_lien', strtoupper($type_lien));
                        $stmt->bindValue(':lien', $lien);
                        $stmt->bindValue(':photo_1', $photo);
                        $stmt->bindValue(':photo_2', $photo_2);
                        $stmt->bindValue(':photo_3', $photo_3);
                        $stmt->bindValue(':pdf_txt_1', $pdf_txt_1);
                        $stmt->bindValue(':pdf_lien_1', $pdf_lien_1);
                        $stmt->bindValue(':pdf_txt_2', $pdf_txt_2);
                        $stmt->bindValue(':pdf_lien_2', $pdf_lien_2);
                        $stmt->bindValue(':pdf_txt_3', $pdf_txt_3);
                        $stmt->bindValue(':pdf_lien_3', $pdf_lien_3);

                        $stmt->execute();


                        break;
                    case "A ARCHIVER":


                        $ref = trim($ligne[28]);

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
                        $sql = "INSERT INTO CENTRALE_PRODUITS.dbo.IMPORT_PRODUITS
                                    (PART_ID, Fournisseur, Rayon, Famille, Filtre1, Valeur1, Filtre2, Valeur2, Filtre3, Valeur3, Filtre4, Valeur4, Filtre5, Valeur5, Filtre6, Valeur6, Filtre7, Valeur7, Filtre8, Valeur8, Filtre9, Valeur9, Filtre10, Valeur10, Type_Prod, Ref_Parent, Code_Maitre, Vte_Addi, Ref_Part, Ref_Fourn, EAN, Nom_Produit, Descrip_Courte, Descrip_Longue, Detail_Prod, Info_Frs, Triptyque, No_Serie, Delais_Liv, Qte_Cmde, Conditionnement, Prix_Net, Prix_Public_HT, Prix_CA_1, Prix_VC_1, Prix_CA_2, Prix_VC_2, Prix_CA_3, Prix_VC_3, Prix_CA_4, Prix_VC_4, Prix_CA_5, Prix_VC_5, Degres_Qte_1, Degres_Prix_1, Degres_Qte_2, Degres_Prix_2, Degres_Qte_3, Degres_Prix_3, Degres_Qte_4, Degres_Prix_4, Degres_Qte_5, Degres_Prix_5, Degres_Qte_6, Degres_Prix_6, Degres_Qte_7, Degres_Prix_7, Degres_Qte_8, Degres_Prix_8, Degres_Qte_9, Degres_Prix_9, Degres_Qte_10, Degres_Prix_10, Remise_PCT, Type_Lien, Lien, Photo1, Photo2, Photo3, PDF_Txt_1, PDF_Lien_1, PDF_Txt_2, PDF_Lien_2, PDF_Txt_3, PDF_Lien_3, Variable_Session)
                                        VALUES
                                    (1, :fournisseur, :rayon, :famille, :filtre1, :valeur1, :filtre2, :valeur2, :filtre3, :valeur3, :filtre4, :valeur4, :filtre5, :valeur5, :filtre6, :valeur6, :filtre7, :valeur7, :filtre8, :valeur8, :filtre9, :valeur9, :filtre10, :valeur10, :type_prod, :ref_parent, :code_maitre, :vte_addi, :ref_part, :ref_fourn, :ean, :nom, :descr_courte, :descr_longue, :detail_prod, :info_fourn, :triptyque, :no_serie, :delais_liv, :qte_cmd, :conditionnement, :prix_net, :prix_public_ht, :prix_ca_1, :prix_vc_1, :prix_ca_2, :prix_vc_2,:prix_ca_3, :prix_vc_3, :prix_ca_4, :prix_vc_4, :prix_ca_5, :prix_vc_5, :degres_qte_1, :degres_prix_1, :degres_qte_2, :degres_prix_2, :degres_qte_3, :degres_prix_3, :degres_qte_4, :degres_prix_4, :degres_qte_5, :degres_prix_5, :degres_qte_6, :degres_prix_6, :degres_qte_7, :degres_prix_7, :degres_qte_8, :degres_prix_8, :degres_qte_9, :degres_prix_9, :degres_qte_10, :degres_prix_10, :remise, :type_lien, :lien, :photo_1, :photo_2, :photo_3, :pdf_txt_1, :pdf_lien_1, :pdf_txt_2, :pdf_lien_2, :pdf_txt_3, :pdf_lien_3, 123456)";

                        $stmt = $conn->prepare($sql);
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
                        $stmt->bindValue(':type_prod', $type_produit);
                        $stmt->bindValue(':ref_parent', $ref_parent);
                        $stmt->bindValue(':code_maitre', $code_maitre);
                        $stmt->bindValue(':vte_addi', $vte_addi);
                        $stmt->bindValue(':ref_part', $ref_ac);
                        $stmt->bindValue(':ref_fourn', $ref_fourn);
                        $stmt->bindValue(':ean', $ean);
                        $stmt->bindValue(':nom', $produit);
                        $stmt->bindValue(':descr_courte', $descr_courte);
                        $stmt->bindValue(':descr_longue', $descr_longue);
                        $stmt->bindValue(':detail_prod', $detail_prod);
                        $stmt->bindValue(':info_fourn', $info_frs);
                        $stmt->bindValue(':triptyque', $triptyque);
                        $stmt->bindValue(':no_serie', $no_serie);
                        $stmt->bindValue(':delais_liv', $delai_livraison);
                        $stmt->bindValue(':qte_cmd', $quantite);
                        $stmt->bindValue(':conditionnement', $conditionnement);
                        $stmt->bindValue(':prix_net', $prix_net);
                        $stmt->bindValue(':prix_public_ht', $prix_public);
                        $stmt->bindValue(':prix_ca_1', $prix_ca_1);
                        $stmt->bindValue(':prix_vc_1', $prix_vc_1);
                        $stmt->bindValue(':prix_ca_2', $prix_ca_2);
                        $stmt->bindValue(':prix_vc_2', $prix_vc_2);
                        $stmt->bindValue(':prix_ca_3', $prix_ca_3);
                        $stmt->bindValue(':prix_vc_3', $prix_vc_3);
                        $stmt->bindValue(':prix_ca_4', $prix_ca_4);
                        $stmt->bindValue(':prix_vc_4', $prix_vc_4);
                        $stmt->bindValue(':prix_ca_5', $prix_ca_5);
                        $stmt->bindValue(':prix_vc_5', $prix_vc_5);
                        $stmt->bindValue(':degres_qte_1', $degres_qte_1);
                        $stmt->bindValue(':degres_prix_1', $degres_prix_1);
                        $stmt->bindValue(':degres_qte_2', $degres_qte_2);
                        $stmt->bindValue(':degres_prix_2', $degres_prix_2);
                        $stmt->bindValue(':degres_qte_3', $degres_qte_3);
                        $stmt->bindValue(':degres_prix_3', $degres_prix_3);
                        $stmt->bindValue(':degres_qte_4', $degres_qte_4);
                        $stmt->bindValue(':degres_prix_4', $degres_prix_4);
                        $stmt->bindValue(':degres_qte_5', $degres_qte_5);
                        $stmt->bindValue(':degres_prix_5', $degres_prix_5);
                        $stmt->bindValue(':degres_qte_6', $degres_qte_6);
                        $stmt->bindValue(':degres_prix_6', $degres_prix_6);
                        $stmt->bindValue(':degres_qte_7', $degres_qte_7);
                        $stmt->bindValue(':degres_prix_7', $degres_prix_7);
                        $stmt->bindValue(':degres_qte_8', $degres_qte_8);
                        $stmt->bindValue(':degres_prix_8', $degres_prix_8);
                        $stmt->bindValue(':degres_qte_9', $degres_qte_9);
                        $stmt->bindValue(':degres_prix_9', $degres_prix_9);
                        $stmt->bindValue(':degres_qte_10', $degres_qte_10);
                        $stmt->bindValue(':degres_prix_10', $degres_prix_10);
                        $stmt->bindValue(':remise', $remise);
                        $stmt->bindValue(':type_lien', $type_lien);
                        $stmt->bindValue(':lien', $lien);
                        $stmt->bindValue(':photo_1', $photo);
                        $stmt->bindValue(':photo_2', $photo_2);
                        $stmt->bindValue(':photo_3', $photo_3);
                        $stmt->bindValue(':pdf_txt_1', $pdf_txt_1);
                        $stmt->bindValue(':pdf_lien_1', $pdf_lien_1);
                        $stmt->bindValue(':pdf_txt_2', $pdf_txt_2);
                        $stmt->bindValue(':pdf_lien_2', $pdf_lien_2);
                        $stmt->bindValue(':pdf_txt_3', $pdf_txt_3);
                        $stmt->bindValue(':pdf_lien_3', $pdf_lien_3);

                        $stmt->execute();


                        break;

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


