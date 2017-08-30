<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImportProduits
 *
 * @ORM\Table(name="IMPORT_PRODUITS")
 * @ORM\Entity
 */
class ImportProduits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="PART_ID", type="integer", nullable=true)
     */
    private $partId;

    /**
     * @var string
     *
     * @ORM\Column(name="Fournisseur", type="string", length=100, nullable=true)
     */
    private $fournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="Rayon", type="string", length=100, nullable=true)
     */
    private $rayon;

    /**
     * @var string
     *
     * @ORM\Column(name="Famille", type="string", length=100, nullable=true)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre1", type="string", length=100, nullable=true)
     */
    private $filtre1;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur1", type="string", length=100, nullable=true)
     */
    private $valeur1;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre2", type="string", length=100, nullable=true)
     */
    private $filtre2;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur2", type="string", length=100, nullable=true)
     */
    private $valeur2;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre3", type="string", length=100, nullable=true)
     */
    private $filtre3;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur3", type="string", length=100, nullable=true)
     */
    private $valeur3;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre4", type="string", length=100, nullable=true)
     */
    private $filtre4;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur4", type="string", length=100, nullable=true)
     */
    private $valeur4;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre5", type="string", length=100, nullable=true)
     */
    private $filtre5;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur5", type="string", length=100, nullable=true)
     */
    private $valeur5;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre6", type="string", length=100, nullable=true)
     */
    private $filtre6;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur6", type="string", length=100, nullable=true)
     */
    private $valeur6;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre7", type="string", length=100, nullable=true)
     */
    private $filtre7;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur7", type="string", length=100, nullable=true)
     */
    private $valeur7;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre8", type="string", length=100, nullable=true)
     */
    private $filtre8;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur8", type="string", length=100, nullable=true)
     */
    private $valeur8;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre9", type="string", length=100, nullable=true)
     */
    private $filtre9;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur9", type="string", length=100, nullable=true)
     */
    private $valeur9;

    /**
     * @var string
     *
     * @ORM\Column(name="Filtre10", type="string", length=100, nullable=true)
     */
    private $filtre10;

    /**
     * @var string
     *
     * @ORM\Column(name="Valeur10", type="string", length=100, nullable=true)
     */
    private $valeur10;

    /**
     * @var string
     *
     * @ORM\Column(name="Ref_Part", type="string", length=100, nullable=true)
     */
    private $refPart;

    /**
     * @var string
     *
     * @ORM\Column(name="Ref_Fourn", type="string", length=100, nullable=true)
     */
    private $refFourn;

    /**
     * @var string
     *
     * @ORM\Column(name="EAN", type="string", length=13, nullable=true)
     */
    private $ean;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Produit", type="string", length=200, nullable=true)
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="Descrip_Courte", type="string", length=1000, nullable=true)
     */
    private $descripCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="Descrip_Longue", type="string", length=5000, nullable=true)
     */
    private $descripLongue;

    /**
     * @var string
     *
     * @ORM\Column(name="Triptyque", type="string", length=100, nullable=true)
     */
    private $triptyque;

    /**
     * @var string
     *
     * @ORM\Column(name="Qte_Cmde", type="string", length=50, nullable=true)
     */
    private $qteCmde;

    /**
     * @var string
     *
     * @ORM\Column(name="Conditionnement", type="string", length=100, nullable=true)
     */
    private $conditionnement;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Public_HT", type="string", length=100, nullable=true)
     */
    private $prixPublicHt;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_Part_HT", type="string", length=100, nullable=true)
     */
    private $prixPartHt;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix_VC", type="string", length=100, nullable=true)
     */
    private $prixVc;

    /**
     * @var string
     *
     * @ORM\Column(name="Remise_PCT", type="string", length=100, nullable=true)
     */
    private $remisePct;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Lien", type="string", length=100, nullable=true)
     */
    private $typeLien;

    /**
     * @var string
     *
     * @ORM\Column(name="Lien", type="string", length=500, nullable=true)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="Photo", type="string", length=100, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="Variable_Session", type="string", length=50, nullable=true)
     */
    private $variableSession;


}

