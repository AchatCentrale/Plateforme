<?php

namespace FunecapBundle\Entity;

/**
 * CommandeEntete
 */
class CommandeEntete
{
    /**
     * @var integer
     */
    private $ceId;

    /**
     * @var integer
     */
    private $clId;

    /**
     * @var \DateTime
     */
    private $ceDate;

    /**
     * @var float
     */
    private $cePort;

    /**
     * @var float
     */
    private $cePortTva;

    /**
     * @var float
     */
    private $ceTotal;

    /**
     * @var integer
     */
    private $ceEtiqCb;

    /**
     * @var integer
     */
    private $ceEtiqPv;

    /**
     * @var string
     */
    private $ceTempo;

    /**
     * @var integer
     */
    private $ceStatus;

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
     * @var \FunecapBundle\Entity\MessageEntete
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
     * @param \FunecapBundle\Entity\MessageEntete $me
     *
     * @return CommandeEntete
     */
    public function setMe(\FunecapBundle\Entity\MessageEntete $me = null)
    {
        $this->me = $me;

        return $this;
    }

    /**
     * Get me
     *
     * @return \FunecapBundle\Entity\MessageEntete
     */
    public function getMe()
    {
        return $this->me;
    }
}

