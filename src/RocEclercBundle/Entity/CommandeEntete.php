<?php

namespace RocEclercBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeEntete
 *
 * @ORM\Table(name="COMMANDE_ENTETE", indexes={@ORM\Index(name="IDX_BD3767A9FD61DBA2", columns={"ME_ID"})})
 * @ORM\Entity
 */
class CommandeEntete
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CE_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer", nullable=true)
     */
    private $clId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CE_DATE", type="date", nullable=true)
     */
    private $ceDate;

    /**
     * @var float
     *
     * @ORM\Column(name="CE_PORT", type="float", precision=53, scale=0, nullable=true)
     */
    private $cePort;

    /**
     * @var float
     *
     * @ORM\Column(name="CE_PORT_TVA", type="float", precision=53, scale=0, nullable=true)
     */
    private $cePortTva;

    /**
     * @var float
     *
     * @ORM\Column(name="CE_TOTAL", type="float", precision=53, scale=0, nullable=true)
     */
    private $ceTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="CE_ETIQ_CB", type="integer", nullable=true)
     */
    private $ceEtiqCb;

    /**
     * @var integer
     *
     * @ORM\Column(name="CE_ETIQ_PV", type="integer", nullable=true)
     */
    private $ceEtiqPv;

    /**
     * @var string
     *
     * @ORM\Column(name="CE_TEMPO", type="string", length=50, nullable=true)
     */
    private $ceTempo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CE_STATUS", type="integer", nullable=true)
     */
    private $ceStatus;

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
     * @var \RocEclercBundle\Entity\MessageEntete
     *
     * @ORM\ManyToOne(targetEntity="RocEclercBundle\Entity\MessageEntete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ME_ID", referencedColumnName="ME_ID")
     * })
     */
    private $me;



    /**
     * Get ceId
     *
     * @return integer
     */
    public function getCeId()
    {
        return $this->ceId;
    }

    /**
     * Set clId
     *
     * @param integer $clId
     *
     * @return CommandeEntete
     */
    public function setClId($clId)
    {
        $this->clId = $clId;

        return $this;
    }

    /**
     * Get clId
     *
     * @return integer
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set ceDate
     *
     * @param \DateTime $ceDate
     *
     * @return CommandeEntete
     */
    public function setCeDate($ceDate)
    {
        $this->ceDate = $ceDate;

        return $this;
    }

    /**
     * Get ceDate
     *
     * @return \DateTime
     */
    public function getCeDate()
    {
        return $this->ceDate;
    }

    /**
     * Set cePort
     *
     * @param float $cePort
     *
     * @return CommandeEntete
     */
    public function setCePort($cePort)
    {
        $this->cePort = $cePort;

        return $this;
    }

    /**
     * Get cePort
     *
     * @return float
     */
    public function getCePort()
    {
        return $this->cePort;
    }

    /**
     * Set cePortTva
     *
     * @param float $cePortTva
     *
     * @return CommandeEntete
     */
    public function setCePortTva($cePortTva)
    {
        $this->cePortTva = $cePortTva;

        return $this;
    }

    /**
     * Get cePortTva
     *
     * @return float
     */
    public function getCePortTva()
    {
        return $this->cePortTva;
    }

    /**
     * Set ceTotal
     *
     * @param float $ceTotal
     *
     * @return CommandeEntete
     */
    public function setCeTotal($ceTotal)
    {
        $this->ceTotal = $ceTotal;

        return $this;
    }

    /**
     * Get ceTotal
     *
     * @return float
     */
    public function getCeTotal()
    {
        return $this->ceTotal;
    }

    /**
     * Set ceEtiqCb
     *
     * @param integer $ceEtiqCb
     *
     * @return CommandeEntete
     */
    public function setCeEtiqCb($ceEtiqCb)
    {
        $this->ceEtiqCb = $ceEtiqCb;

        return $this;
    }

    /**
     * Get ceEtiqCb
     *
     * @return integer
     */
    public function getCeEtiqCb()
    {
        return $this->ceEtiqCb;
    }

    /**
     * Set ceEtiqPv
     *
     * @param integer $ceEtiqPv
     *
     * @return CommandeEntete
     */
    public function setCeEtiqPv($ceEtiqPv)
    {
        $this->ceEtiqPv = $ceEtiqPv;

        return $this;
    }

    /**
     * Get ceEtiqPv
     *
     * @return integer
     */
    public function getCeEtiqPv()
    {
        return $this->ceEtiqPv;
    }

    /**
     * Set ceTempo
     *
     * @param string $ceTempo
     *
     * @return CommandeEntete
     */
    public function setCeTempo($ceTempo)
    {
        $this->ceTempo = $ceTempo;

        return $this;
    }

    /**
     * Get ceTempo
     *
     * @return string
     */
    public function getCeTempo()
    {
        return $this->ceTempo;
    }

    /**
     * Set ceStatus
     *
     * @param integer $ceStatus
     *
     * @return CommandeEntete
     */
    public function setCeStatus($ceStatus)
    {
        $this->ceStatus = $ceStatus;

        return $this;
    }

    /**
     * Get ceStatus
     *
     * @return integer
     */
    public function getCeStatus()
    {
        return $this->ceStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return CommandeEntete
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
     * @return CommandeEntete
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
     * @return CommandeEntete
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
     * @return CommandeEntete
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
     * Set me
     *
     * @param \RocEclercBundle\Entity\MessageEntete $me
     *
     * @return CommandeEntete
     */
    public function setMe(\RocEclercBundle\Entity\MessageEntete $me = null)
    {
        $this->me = $me;

        return $this;
    }

    /**
     * Get me
     *
     * @return \RocEclercBundle\Entity\MessageEntete
     */
    public function getMe()
    {
        return $this->me;
    }
}
