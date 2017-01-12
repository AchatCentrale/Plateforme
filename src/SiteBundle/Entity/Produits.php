<?php

namespace SiteBundle\Entity;

/**
 * Produits
 */
class Produits
{
    /**
     * @var integer
     */
    private $soId;

    /**
     * @var integer
     */
    private $foId;

    /**
     * @var integer
     */
    private $raId;

    /**
     * @var integer
     */
    private $faId;

    /**
     * @var string
     */
    private $prRef;

    /**
     * @var string
     */
    private $prRefFrs;

    /**
     * @var string
     */
    private $prNom;

    /**
     * @var string
     */
    private $prDescrCourte;

    /**
     * @var string
     */
    private $prDescrLongue;

    /**
     * @var string
     */
    private $prTriptyque;

    /**
     * @var integer
     */
    private $prQteCmde;

    /**
     * @var string
     */
    private $prCondt;

    /**
     * @var float
     */
    private $prPrixPublic;

    /**
     * @var float
     */
    private $prPrixCa;

    /**
     * @var float
     */
    private $prRemise;

    /**
     * @var string
     */
    private $prTypeLien;

    /**
     * @var string
     */
    private $prLien;

    /**
     * @var integer
     */
    private $prPhare;

    /**
     * @var integer
     */
    private $prStatus;

    /**
     * @var string
     */
    private $prTempo;

    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
     */
    private $insUser;

    /**
     * @var \DateTime
     */
    private $majDate;

    /**
     * @var string
     */
    private $majUser;

    /**
     * @var integer
     */
    private $prId;


    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Produits
     */
    public function setSoId($soId)
    {
        $this->soId = $soId;

        return $this;
    }

    /**
     * Get soId
     *
     * @return integer
     */
    public function getSoId()
    {
        return $this->soId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return Produits
     */
    public function setFoId($foId)
    {
        $this->foId = $foId;

        return $this;
    }

    /**
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set raId
     *
     * @param integer $raId
     *
     * @return Produits
     */
    public function setRaId($raId)
    {
        $this->raId = $raId;

        return $this;
    }

    /**
     * Get raId
     *
     * @return integer
     */
    public function getRaId()
    {
        return $this->raId;
    }

    /**
     * Set faId
     *
     * @param integer $faId
     *
     * @return Produits
     */
    public function setFaId($faId)
    {
        $this->faId = $faId;

        return $this;
    }

    /**
     * Get faId
     *
     * @return integer
     */
    public function getFaId()
    {
        return $this->faId;
    }

    /**
     * Set prRef
     *
     * @param string $prRef
     *
     * @return Produits
     */
    public function setPrRef($prRef)
    {
        $this->prRef = $prRef;

        return $this;
    }

    /**
     * Get prRef
     *
     * @return string
     */
    public function getPrRef()
    {
        return $this->prRef;
    }

    /**
     * Set prRefFrs
     *
     * @param string $prRefFrs
     *
     * @return Produits
     */
    public function setPrRefFrs($prRefFrs)
    {
        $this->prRefFrs = $prRefFrs;

        return $this;
    }

    /**
     * Get prRefFrs
     *
     * @return string
     */
    public function getPrRefFrs()
    {
        return $this->prRefFrs;
    }

    /**
     * Set prNom
     *
     * @param string $prNom
     *
     * @return Produits
     */
    public function setPrNom($prNom)
    {
        $this->prNom = $prNom;

        return $this;
    }

    /**
     * Get prNom
     *
     * @return string
     */
    public function getPrNom()
    {
        return $this->prNom;
    }

    /**
     * Set prDescrCourte
     *
     * @param string $prDescrCourte
     *
     * @return Produits
     */
    public function setPrDescrCourte($prDescrCourte)
    {
        $this->prDescrCourte = $prDescrCourte;

        return $this;
    }

    /**
     * Get prDescrCourte
     *
     * @return string
     */
    public function getPrDescrCourte()
    {
        return $this->prDescrCourte;
    }

    /**
     * Set prDescrLongue
     *
     * @param string $prDescrLongue
     *
     * @return Produits
     */
    public function setPrDescrLongue($prDescrLongue)
    {
        $this->prDescrLongue = $prDescrLongue;

        return $this;
    }

    /**
     * Get prDescrLongue
     *
     * @return string
     */
    public function getPrDescrLongue()
    {
        return $this->prDescrLongue;
    }

    /**
     * Set prTriptyque
     *
     * @param string $prTriptyque
     *
     * @return Produits
     */
    public function setPrTriptyque($prTriptyque)
    {
        $this->prTriptyque = $prTriptyque;

        return $this;
    }

    /**
     * Get prTriptyque
     *
     * @return string
     */
    public function getPrTriptyque()
    {
        return $this->prTriptyque;
    }

    /**
     * Set prQteCmde
     *
     * @param integer $prQteCmde
     *
     * @return Produits
     */
    public function setPrQteCmde($prQteCmde)
    {
        $this->prQteCmde = $prQteCmde;

        return $this;
    }

    /**
     * Get prQteCmde
     *
     * @return integer
     */
    public function getPrQteCmde()
    {
        return $this->prQteCmde;
    }

    /**
     * Set prCondt
     *
     * @param string $prCondt
     *
     * @return Produits
     */
    public function setPrCondt($prCondt)
    {
        $this->prCondt = $prCondt;

        return $this;
    }

    /**
     * Get prCondt
     *
     * @return string
     */
    public function getPrCondt()
    {
        return $this->prCondt;
    }

    /**
     * Set prPrixPublic
     *
     * @param float $prPrixPublic
     *
     * @return Produits
     */
    public function setPrPrixPublic($prPrixPublic)
    {
        $this->prPrixPublic = $prPrixPublic;

        return $this;
    }

    /**
     * Get prPrixPublic
     *
     * @return float
     */
    public function getPrPrixPublic()
    {
        return $this->prPrixPublic;
    }

    /**
     * Set prPrixCa
     *
     * @param float $prPrixCa
     *
     * @return Produits
     */
    public function setPrPrixCa($prPrixCa)
    {
        $this->prPrixCa = $prPrixCa;

        return $this;
    }

    /**
     * Get prPrixCa
     *
     * @return float
     */
    public function getPrPrixCa()
    {
        return $this->prPrixCa;
    }

    /**
     * Set prRemise
     *
     * @param float $prRemise
     *
     * @return Produits
     */
    public function setPrRemise($prRemise)
    {
        $this->prRemise = $prRemise;

        return $this;
    }

    /**
     * Get prRemise
     *
     * @return float
     */
    public function getPrRemise()
    {
        return $this->prRemise;
    }

    /**
     * Set prTypeLien
     *
     * @param string $prTypeLien
     *
     * @return Produits
     */
    public function setPrTypeLien($prTypeLien)
    {
        $this->prTypeLien = $prTypeLien;

        return $this;
    }

    /**
     * Get prTypeLien
     *
     * @return string
     */
    public function getPrTypeLien()
    {
        return $this->prTypeLien;
    }

    /**
     * Set prLien
     *
     * @param string $prLien
     *
     * @return Produits
     */
    public function setPrLien($prLien)
    {
        $this->prLien = $prLien;

        return $this;
    }

    /**
     * Get prLien
     *
     * @return string
     */
    public function getPrLien()
    {
        return $this->prLien;
    }

    /**
     * Set prPhare
     *
     * @param integer $prPhare
     *
     * @return Produits
     */
    public function setPrPhare($prPhare)
    {
        $this->prPhare = $prPhare;

        return $this;
    }

    /**
     * Get prPhare
     *
     * @return integer
     */
    public function getPrPhare()
    {
        return $this->prPhare;
    }

    /**
     * Set prStatus
     *
     * @param integer $prStatus
     *
     * @return Produits
     */
    public function setPrStatus($prStatus)
    {
        $this->prStatus = $prStatus;

        return $this;
    }

    /**
     * Get prStatus
     *
     * @return integer
     */
    public function getPrStatus()
    {
        return $this->prStatus;
    }

    /**
     * Set prTempo
     *
     * @param string $prTempo
     *
     * @return Produits
     */
    public function setPrTempo($prTempo)
    {
        $this->prTempo = $prTempo;

        return $this;
    }

    /**
     * Get prTempo
     *
     * @return string
     */
    public function getPrTempo()
    {
        return $this->prTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Produits
     */
    public function setInsDate($insDate)
    {
        $this->insDate = $insDate;

        return $this;
    }

    /**
     * Get insDate
     *
     * @return \DateTime
     */
    public function getInsDate()
    {
        return $this->insDate;
    }

    /**
     * Set insUser
     *
     * @param string $insUser
     *
     * @return Produits
     */
    public function setInsUser($insUser)
    {
        $this->insUser = $insUser;

        return $this;
    }

    /**
     * Get insUser
     *
     * @return string
     */
    public function getInsUser()
    {
        return $this->insUser;
    }

    /**
     * Set majDate
     *
     * @param \DateTime $majDate
     *
     * @return Produits
     */
    public function setMajDate($majDate)
    {
        $this->majDate = $majDate;

        return $this;
    }

    /**
     * Get majDate
     *
     * @return \DateTime
     */
    public function getMajDate()
    {
        return $this->majDate;
    }

    /**
     * Set majUser
     *
     * @param string $majUser
     *
     * @return Produits
     */
    public function setMajUser($majUser)
    {
        $this->majUser = $majUser;

        return $this;
    }

    /**
     * Get majUser
     *
     * @return string
     */
    public function getMajUser()
    {
        return $this->majUser;
    }

    /**
     * Get prId
     *
     * @return integer
     */
    public function getPrId()
    {
        return $this->prId;
    }
}

