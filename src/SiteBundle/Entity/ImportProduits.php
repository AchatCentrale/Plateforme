<?php

namespace SiteBundle\Entity;

/**
 * ImportProduits
 */
class ImportProduits
{
    /**
     * @var integer
     */
    private $partId;

    /**
     * @var string
     */
    private $fournisseur;

    /**
     * @var string
     */
    private $rayon;

    /**
     * @var string
     */
    private $famille;

    /**
     * @var string
     */
    private $filtre1;

    /**
     * @var string
     */
    private $valeur1;

    /**
     * @var string
     */
    private $filtre2;

    /**
     * @var string
     */
    private $valeur2;

    /**
     * @var string
     */
    private $filtre3;

    /**
     * @var string
     */
    private $valeur3;

    /**
     * @var string
     */
    private $filtre4;

    /**
     * @var string
     */
    private $valeur4;

    /**
     * @var string
     */
    private $filtre5;

    /**
     * @var string
     */
    private $valeur5;

    /**
     * @var string
     */
    private $filtre6;

    /**
     * @var string
     */
    private $valeur6;

    /**
     * @var string
     */
    private $filtre7;

    /**
     * @var string
     */
    private $valeur7;

    /**
     * @var string
     */
    private $filtre8;

    /**
     * @var string
     */
    private $valeur8;

    /**
     * @var string
     */
    private $filtre9;

    /**
     * @var string
     */
    private $valeur9;

    /**
     * @var string
     */
    private $filtre10;

    /**
     * @var string
     */
    private $valeur10;

    /**
     * @var string
     */
    private $refPart;

    /**
     * @var string
     */
    private $refFourn;

    /**
     * @var string
     */
    private $nomProduit;

    /**
     * @var string
     */
    private $descripCourte;

    /**
     * @var string
     */
    private $descripLongue;

    /**
     * @var string
     */
    private $triptyque;

    /**
     * @var string
     */
    private $qteCmde;

    /**
     * @var string
     */
    private $conditionnement;

    /**
     * @var string
     */
    private $prixPublicHt;

    /**
     * @var string
     */
    private $prixPartHt;

    /**
     * @var string
     */
    private $remisePct;

    /**
     * @var string
     */
    private $typeLien;

    /**
     * @var string
     */
    private $lien;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var string
     */
    private $variableSession;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set partId
     *
     * @param integer $partId
     *
     * @return ImportProduits
     */
    public function setPartId($partId)
    {
        $this->partId = $partId;

        return $this;
    }

    /**
     * Get partId
     *
     * @return integer
     */
    public function getPartId()
    {
        return $this->partId;
    }

    /**
     * Set fournisseur
     *
     * @param string $fournisseur
     *
     * @return ImportProduits
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return string
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set rayon
     *
     * @param string $rayon
     *
     * @return ImportProduits
     */
    public function setRayon($rayon)
    {
        $this->rayon = $rayon;

        return $this;
    }

    /**
     * Get rayon
     *
     * @return string
     */
    public function getRayon()
    {
        return $this->rayon;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return ImportProduits
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set filtre1
     *
     * @param string $filtre1
     *
     * @return ImportProduits
     */
    public function setFiltre1($filtre1)
    {
        $this->filtre1 = $filtre1;

        return $this;
    }

    /**
     * Get filtre1
     *
     * @return string
     */
    public function getFiltre1()
    {
        return $this->filtre1;
    }

    /**
     * Set valeur1
     *
     * @param string $valeur1
     *
     * @return ImportProduits
     */
    public function setValeur1($valeur1)
    {
        $this->valeur1 = $valeur1;

        return $this;
    }

    /**
     * Get valeur1
     *
     * @return string
     */
    public function getValeur1()
    {
        return $this->valeur1;
    }

    /**
     * Set filtre2
     *
     * @param string $filtre2
     *
     * @return ImportProduits
     */
    public function setFiltre2($filtre2)
    {
        $this->filtre2 = $filtre2;

        return $this;
    }

    /**
     * Get filtre2
     *
     * @return string
     */
    public function getFiltre2()
    {
        return $this->filtre2;
    }

    /**
     * Set valeur2
     *
     * @param string $valeur2
     *
     * @return ImportProduits
     */
    public function setValeur2($valeur2)
    {
        $this->valeur2 = $valeur2;

        return $this;
    }

    /**
     * Get valeur2
     *
     * @return string
     */
    public function getValeur2()
    {
        return $this->valeur2;
    }

    /**
     * Set filtre3
     *
     * @param string $filtre3
     *
     * @return ImportProduits
     */
    public function setFiltre3($filtre3)
    {
        $this->filtre3 = $filtre3;

        return $this;
    }

    /**
     * Get filtre3
     *
     * @return string
     */
    public function getFiltre3()
    {
        return $this->filtre3;
    }

    /**
     * Set valeur3
     *
     * @param string $valeur3
     *
     * @return ImportProduits
     */
    public function setValeur3($valeur3)
    {
        $this->valeur3 = $valeur3;

        return $this;
    }

    /**
     * Get valeur3
     *
     * @return string
     */
    public function getValeur3()
    {
        return $this->valeur3;
    }

    /**
     * Set filtre4
     *
     * @param string $filtre4
     *
     * @return ImportProduits
     */
    public function setFiltre4($filtre4)
    {
        $this->filtre4 = $filtre4;

        return $this;
    }

    /**
     * Get filtre4
     *
     * @return string
     */
    public function getFiltre4()
    {
        return $this->filtre4;
    }

    /**
     * Set valeur4
     *
     * @param string $valeur4
     *
     * @return ImportProduits
     */
    public function setValeur4($valeur4)
    {
        $this->valeur4 = $valeur4;

        return $this;
    }

    /**
     * Get valeur4
     *
     * @return string
     */
    public function getValeur4()
    {
        return $this->valeur4;
    }

    /**
     * Set filtre5
     *
     * @param string $filtre5
     *
     * @return ImportProduits
     */
    public function setFiltre5($filtre5)
    {
        $this->filtre5 = $filtre5;

        return $this;
    }

    /**
     * Get filtre5
     *
     * @return string
     */
    public function getFiltre5()
    {
        return $this->filtre5;
    }

    /**
     * Set valeur5
     *
     * @param string $valeur5
     *
     * @return ImportProduits
     */
    public function setValeur5($valeur5)
    {
        $this->valeur5 = $valeur5;

        return $this;
    }

    /**
     * Get valeur5
     *
     * @return string
     */
    public function getValeur5()
    {
        return $this->valeur5;
    }

    /**
     * Set filtre6
     *
     * @param string $filtre6
     *
     * @return ImportProduits
     */
    public function setFiltre6($filtre6)
    {
        $this->filtre6 = $filtre6;

        return $this;
    }

    /**
     * Get filtre6
     *
     * @return string
     */
    public function getFiltre6()
    {
        return $this->filtre6;
    }

    /**
     * Set valeur6
     *
     * @param string $valeur6
     *
     * @return ImportProduits
     */
    public function setValeur6($valeur6)
    {
        $this->valeur6 = $valeur6;

        return $this;
    }

    /**
     * Get valeur6
     *
     * @return string
     */
    public function getValeur6()
    {
        return $this->valeur6;
    }

    /**
     * Set filtre7
     *
     * @param string $filtre7
     *
     * @return ImportProduits
     */
    public function setFiltre7($filtre7)
    {
        $this->filtre7 = $filtre7;

        return $this;
    }

    /**
     * Get filtre7
     *
     * @return string
     */
    public function getFiltre7()
    {
        return $this->filtre7;
    }

    /**
     * Set valeur7
     *
     * @param string $valeur7
     *
     * @return ImportProduits
     */
    public function setValeur7($valeur7)
    {
        $this->valeur7 = $valeur7;

        return $this;
    }

    /**
     * Get valeur7
     *
     * @return string
     */
    public function getValeur7()
    {
        return $this->valeur7;
    }

    /**
     * Set filtre8
     *
     * @param string $filtre8
     *
     * @return ImportProduits
     */
    public function setFiltre8($filtre8)
    {
        $this->filtre8 = $filtre8;

        return $this;
    }

    /**
     * Get filtre8
     *
     * @return string
     */
    public function getFiltre8()
    {
        return $this->filtre8;
    }

    /**
     * Set valeur8
     *
     * @param string $valeur8
     *
     * @return ImportProduits
     */
    public function setValeur8($valeur8)
    {
        $this->valeur8 = $valeur8;

        return $this;
    }

    /**
     * Get valeur8
     *
     * @return string
     */
    public function getValeur8()
    {
        return $this->valeur8;
    }

    /**
     * Set filtre9
     *
     * @param string $filtre9
     *
     * @return ImportProduits
     */
    public function setFiltre9($filtre9)
    {
        $this->filtre9 = $filtre9;

        return $this;
    }

    /**
     * Get filtre9
     *
     * @return string
     */
    public function getFiltre9()
    {
        return $this->filtre9;
    }

    /**
     * Set valeur9
     *
     * @param string $valeur9
     *
     * @return ImportProduits
     */
    public function setValeur9($valeur9)
    {
        $this->valeur9 = $valeur9;

        return $this;
    }

    /**
     * Get valeur9
     *
     * @return string
     */
    public function getValeur9()
    {
        return $this->valeur9;
    }

    /**
     * Set filtre10
     *
     * @param string $filtre10
     *
     * @return ImportProduits
     */
    public function setFiltre10($filtre10)
    {
        $this->filtre10 = $filtre10;

        return $this;
    }

    /**
     * Get filtre10
     *
     * @return string
     */
    public function getFiltre10()
    {
        return $this->filtre10;
    }

    /**
     * Set valeur10
     *
     * @param string $valeur10
     *
     * @return ImportProduits
     */
    public function setValeur10($valeur10)
    {
        $this->valeur10 = $valeur10;

        return $this;
    }

    /**
     * Get valeur10
     *
     * @return string
     */
    public function getValeur10()
    {
        return $this->valeur10;
    }

    /**
     * Set refPart
     *
     * @param string $refPart
     *
     * @return ImportProduits
     */
    public function setRefPart($refPart)
    {
        $this->refPart = $refPart;

        return $this;
    }

    /**
     * Get refPart
     *
     * @return string
     */
    public function getRefPart()
    {
        return $this->refPart;
    }

    /**
     * Set refFourn
     *
     * @param string $refFourn
     *
     * @return ImportProduits
     */
    public function setRefFourn($refFourn)
    {
        $this->refFourn = $refFourn;

        return $this;
    }

    /**
     * Get refFourn
     *
     * @return string
     */
    public function getRefFourn()
    {
        return $this->refFourn;
    }

    /**
     * Set nomProduit
     *
     * @param string $nomProduit
     *
     * @return ImportProduits
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get nomProduit
     *
     * @return string
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set descripCourte
     *
     * @param string $descripCourte
     *
     * @return ImportProduits
     */
    public function setDescripCourte($descripCourte)
    {
        $this->descripCourte = $descripCourte;

        return $this;
    }

    /**
     * Get descripCourte
     *
     * @return string
     */
    public function getDescripCourte()
    {
        return $this->descripCourte;
    }

    /**
     * Set descripLongue
     *
     * @param string $descripLongue
     *
     * @return ImportProduits
     */
    public function setDescripLongue($descripLongue)
    {
        $this->descripLongue = $descripLongue;

        return $this;
    }

    /**
     * Get descripLongue
     *
     * @return string
     */
    public function getDescripLongue()
    {
        return $this->descripLongue;
    }

    /**
     * Set triptyque
     *
     * @param string $triptyque
     *
     * @return ImportProduits
     */
    public function setTriptyque($triptyque)
    {
        $this->triptyque = $triptyque;

        return $this;
    }

    /**
     * Get triptyque
     *
     * @return string
     */
    public function getTriptyque()
    {
        return $this->triptyque;
    }

    /**
     * Set qteCmde
     *
     * @param string $qteCmde
     *
     * @return ImportProduits
     */
    public function setQteCmde($qteCmde)
    {
        $this->qteCmde = $qteCmde;

        return $this;
    }

    /**
     * Get qteCmde
     *
     * @return string
     */
    public function getQteCmde()
    {
        return $this->qteCmde;
    }

    /**
     * Set conditionnement
     *
     * @param string $conditionnement
     *
     * @return ImportProduits
     */
    public function setConditionnement($conditionnement)
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }

    /**
     * Get conditionnement
     *
     * @return string
     */
    public function getConditionnement()
    {
        return $this->conditionnement;
    }

    /**
     * Set prixPublicHt
     *
     * @param string $prixPublicHt
     *
     * @return ImportProduits
     */
    public function setPrixPublicHt($prixPublicHt)
    {
        $this->prixPublicHt = $prixPublicHt;

        return $this;
    }

    /**
     * Get prixPublicHt
     *
     * @return string
     */
    public function getPrixPublicHt()
    {
        return $this->prixPublicHt;
    }

    /**
     * Set prixPartHt
     *
     * @param string $prixPartHt
     *
     * @return ImportProduits
     */
    public function setPrixPartHt($prixPartHt)
    {
        $this->prixPartHt = $prixPartHt;

        return $this;
    }

    /**
     * Get prixPartHt
     *
     * @return string
     */
    public function getPrixPartHt()
    {
        return $this->prixPartHt;
    }

    /**
     * Set remisePct
     *
     * @param string $remisePct
     *
     * @return ImportProduits
     */
    public function setRemisePct($remisePct)
    {
        $this->remisePct = $remisePct;

        return $this;
    }

    /**
     * Get remisePct
     *
     * @return string
     */
    public function getRemisePct()
    {
        return $this->remisePct;
    }

    /**
     * Set typeLien
     *
     * @param string $typeLien
     *
     * @return ImportProduits
     */
    public function setTypeLien($typeLien)
    {
        $this->typeLien = $typeLien;

        return $this;
    }

    /**
     * Get typeLien
     *
     * @return string
     */
    public function getTypeLien()
    {
        return $this->typeLien;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return ImportProduits
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return ImportProduits
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set variableSession
     *
     * @param string $variableSession
     *
     * @return ImportProduits
     */
    public function setVariableSession($variableSession)
    {
        $this->variableSession = $variableSession;

        return $this;
    }

    /**
     * Get variableSession
     *
     * @return string
     */
    public function getVariableSession()
    {
        return $this->variableSession;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

