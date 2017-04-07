<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="PRODUITS")
 * @ORM\Entity
 */
class Produits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RA_ID", type="integer", nullable=true)
     */
    private $raId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FA_ID", type="integer", nullable=true)
     */
    private $faId;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_REF", type="string", length=100, nullable=true)
     */
    private $prRef;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_REF_FRS", type="string", length=100, nullable=true)
     */
    private $prRefFrs;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_NOM", type="string", length=200, nullable=true)
     */
    private $prNom;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_DESCR_COURTE", type="string", length=500, nullable=true)
     */
    private $prDescrCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_DESCR_LONGUE", type="string", length=7000, nullable=true)
     */
    private $prDescrLongue;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TRIPTYQUE", type="string", length=50, nullable=true)
     */
    private $prTriptyque;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_QTE_CMDE", type="integer", nullable=true)
     */
    private $prQteCmde = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="PR_CONDT", type="string", length=50, nullable=true)
     */
    private $prCondt;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_PRIX_PUBLIC", type="float", precision=53, scale=0, nullable=true)
     */
    private $prPrixPublic;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_PRIX_CA", type="float", precision=53, scale=0, nullable=true)
     */
    private $prPrixCa;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_REMISE", type="float", precision=53, scale=0, nullable=true)
     */
    private $prRemise;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TYPE_LIEN", type="string", length=50, nullable=true)
     */
    private $prTypeLien;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_LIEN", type="string", length=500, nullable=true)
     */
    private $prLien;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_PHARE", type="integer", nullable=true)
     */
    private $prPhare = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_STATUS", type="integer", nullable=true)
     */
    private $prStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TEMPO", type="string", length=50, nullable=true)
     */
    private $prTempo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="INS_DATE", type="datetime", nullable=true)
     */
    private $insDate;

    /**
     * @var string
     *
     * @ORM\Column(name="INS_USER", type="string", length=100, nullable=true)
     */
    private $insUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MAJ_DATE", type="datetime", nullable=true)
     */
    private $majDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MAJ_USER", type="string", length=100, nullable=true)
     */
    private $majUser;



    /**
     * Get prId
     *
     * @return integer
     */
    public function getPrId()
    {
        return $this->prId;
    }

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
}
