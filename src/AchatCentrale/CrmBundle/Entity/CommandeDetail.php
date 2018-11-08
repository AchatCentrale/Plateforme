<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeDetail
 *
 * @ORM\Table(name="COMMANDE_DETAIL", indexes={@ORM\Index(name="IDX_8002F979425165C3", columns={"CE_ID"})})
 * @ORM\Entity
 */
class CommandeDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CD_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cdId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer", nullable=true)
     */
    private $prId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CD_DATE", type="datetime", nullable=true)
     */
    private $cdDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="CD_QTE", type="integer", nullable=true)
     */
    private $cdQte;

    /**
     * @var string
     *
     * @ORM\Column(name="CD_DETAIL", type="string", length=5, nullable=true)
     */
    private $cdDetail;

    /**
     * @var string
     *
     * @ORM\Column(name="CD_REF", type="string", length=100, nullable=true)
     */
    private $cdRef;

    /**
     * @var string
     *
     * @ORM\Column(name="CD_EAN", type="string", length=20, nullable=true)
     */
    private $cdEan;

    /**
     * @var string
     *
     * @ORM\Column(name="CD_NOM", type="string", length=200, nullable=true)
     */
    private $cdNom;

    /**
     * @var string
     *
     * @ORM\Column(name="CD_DESCR_COURTE", type="string", length=500, nullable=true)
     */
    private $cdDescrCourte;

    /**
     * @var float
     *
     * @ORM\Column(name="CD_PRIX_PUBLIC", type="float", precision=53, scale=0, nullable=true)
     */
    private $cdPrixPublic;

    /**
     * @var float
     *
     * @ORM\Column(name="CD_PRIX_CA", type="float", precision=53, scale=0, nullable=true)
     */
    private $cdPrixCa;

    /**
     * @var float
     *
     * @ORM\Column(name="CD_PRIX_VC", type="float", precision=53, scale=0, nullable=true)
     */
    private $cdPrixVc;

    /**
     * @var integer
     *
     * @ORM\Column(name="CD_STATUS", type="integer", nullable=true)
     */
    private $cdStatus = '0';

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
     * @var \AchatCentrale\CrmBundle\Entity\CommandeEntete
     *
     * @ORM\ManyToOne(targetEntity="AchatCentrale\CrmBundle\Entity\CommandeEntete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CE_ID", referencedColumnName="CE_ID")
     * })
     */
    private $ce;



    /**
     * Get cdId
     *
     * @return integer
     */
    public function getCdId()
    {
        return $this->cdId;
    }

    /**
     * Set prId
     *
     * @param integer $prId
     *
     * @return CommandeDetail
     */
    public function setPrId($prId)
    {
        $this->prId = $prId;

        return $this;
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

    /**
     * Set cdDate
     *
     * @param \DateTime $cdDate
     *
     * @return CommandeDetail
     */
    public function setCdDate($cdDate)
    {
        $this->cdDate = $cdDate;

        return $this;
    }

    /**
     * Get cdDate
     *
     * @return \DateTime
     */
    public function getCdDate()
    {
        return $this->cdDate;
    }

    /**
     * Set cdQte
     *
     * @param integer $cdQte
     *
     * @return CommandeDetail
     */
    public function setCdQte($cdQte)
    {
        $this->cdQte = $cdQte;

        return $this;
    }

    /**
     * Get cdQte
     *
     * @return integer
     */
    public function getCdQte()
    {
        return $this->cdQte;
    }

    /**
     * Set cdDetail
     *
     * @param string $cdDetail
     *
     * @return CommandeDetail
     */
    public function setCdDetail($cdDetail)
    {
        $this->cdDetail = $cdDetail;

        return $this;
    }

    /**
     * Get cdDetail
     *
     * @return string
     */
    public function getCdDetail()
    {
        return $this->cdDetail;
    }

    /**
     * Set cdRef
     *
     * @param string $cdRef
     *
     * @return CommandeDetail
     */
    public function setCdRef($cdRef)
    {
        $this->cdRef = $cdRef;

        return $this;
    }

    /**
     * Get cdRef
     *
     * @return string
     */
    public function getCdRef()
    {
        return $this->cdRef;
    }

    /**
     * Set cdEan
     *
     * @param string $cdEan
     *
     * @return CommandeDetail
     */
    public function setCdEan($cdEan)
    {
        $this->cdEan = $cdEan;

        return $this;
    }

    /**
     * Get cdEan
     *
     * @return string
     */
    public function getCdEan()
    {
        return $this->cdEan;
    }

    /**
     * Set cdNom
     *
     * @param string $cdNom
     *
     * @return CommandeDetail
     */
    public function setCdNom($cdNom)
    {
        $this->cdNom = $cdNom;

        return $this;
    }

    /**
     * Get cdNom
     *
     * @return string
     */
    public function getCdNom()
    {
        return $this->cdNom;
    }

    /**
     * Set cdDescrCourte
     *
     * @param string $cdDescrCourte
     *
     * @return CommandeDetail
     */
    public function setCdDescrCourte($cdDescrCourte)
    {
        $this->cdDescrCourte = $cdDescrCourte;

        return $this;
    }

    /**
     * Get cdDescrCourte
     *
     * @return string
     */
    public function getCdDescrCourte()
    {
        return $this->cdDescrCourte;
    }

    /**
     * Set cdPrixPublic
     *
     * @param float $cdPrixPublic
     *
     * @return CommandeDetail
     */
    public function setCdPrixPublic($cdPrixPublic)
    {
        $this->cdPrixPublic = $cdPrixPublic;

        return $this;
    }

    /**
     * Get cdPrixPublic
     *
     * @return float
     */
    public function getCdPrixPublic()
    {
        return $this->cdPrixPublic;
    }

    /**
     * Set cdPrixCa
     *
     * @param float $cdPrixCa
     *
     * @return CommandeDetail
     */
    public function setCdPrixCa($cdPrixCa)
    {
        $this->cdPrixCa = $cdPrixCa;

        return $this;
    }

    /**
     * Get cdPrixCa
     *
     * @return float
     */
    public function getCdPrixCa()
    {
        return $this->cdPrixCa;
    }

    /**
     * Set cdPrixVc
     *
     * @param float $cdPrixVc
     *
     * @return CommandeDetail
     */
    public function setCdPrixVc($cdPrixVc)
    {
        $this->cdPrixVc = $cdPrixVc;

        return $this;
    }

    /**
     * Get cdPrixVc
     *
     * @return float
     */
    public function getCdPrixVc()
    {
        return $this->cdPrixVc;
    }

    /**
     * Set cdStatus
     *
     * @param integer $cdStatus
     *
     * @return CommandeDetail
     */
    public function setCdStatus($cdStatus)
    {
        $this->cdStatus = $cdStatus;

        return $this;
    }

    /**
     * Get cdStatus
     *
     * @return integer
     */
    public function getCdStatus()
    {
        return $this->cdStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return CommandeDetail
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
     * @return CommandeDetail
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
     * @return CommandeDetail
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
     * @return CommandeDetail
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
     * Set ce
     *
     * @param \AchatCentrale\CrmBundle\Entity\CommandeEntete $ce
     *
     * @return CommandeDetail
     */
    public function setCe(\AchatCentrale\CrmBundle\Entity\CommandeEntete $ce = null)
    {
        $this->ce = $ce;

        return $this;
    }

    /**
     * Get ce
     *
     * @return \AchatCentrale\CrmBundle\Entity\CommandeEntete
     */
    public function getCe()
    {
        return $this->ce;
    }
}
