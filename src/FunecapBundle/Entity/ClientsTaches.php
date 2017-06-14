<?php

namespace FunecapBundle\Entity;

/**
 * ClientsTaches
 */
class ClientsTaches
{
    /**
     * @var integer
     */
    private $claId;

    /**
     * @var integer
     */
    private $usId;

    /**
     * @var integer
     */
    private $claType;

    /**
     * @var string
     */
    private $claNom;

    /**
     * @var string
     */
    private $claDescr;

    /**
     * @var \DateTime
     */
    private $claEcheance;

    /**
     * @var integer
     */
    private $claPriorite;

    /**
     * @var integer
     */
    private $claNotifRef;

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
     * @var \FunecapBundle\Entity\Clients
     */
    private $cl;


    /**
     * Get claId
     *
     * @return integer
     */
    public function getClaId()
    {
        return $this->claId;
    }

    /**
     * Set usId
     *
     * @param integer $usId
     *
     * @return ClientsTaches
     */
    public function setUsId($usId)
    {
        $this->usId = $usId;

        return $this;
    }

    /**
     * Get usId
     *
     * @return integer
     */
    public function getUsId()
    {
        return $this->usId;
    }

    /**
     * Set claType
     *
     * @param integer $claType
     *
     * @return ClientsTaches
     */
    public function setClaType($claType)
    {
        $this->claType = $claType;

        return $this;
    }

    /**
     * Get claType
     *
     * @return integer
     */
    public function getClaType()
    {
        return $this->claType;
    }

    /**
     * Set claNom
     *
     * @param string $claNom
     *
     * @return ClientsTaches
     */
    public function setClaNom($claNom)
    {
        $this->claNom = $claNom;

        return $this;
    }

    /**
     * Get claNom
     *
     * @return string
     */
    public function getClaNom()
    {
        return $this->claNom;
    }

    /**
     * Set claDescr
     *
     * @param string $claDescr
     *
     * @return ClientsTaches
     */
    public function setClaDescr($claDescr)
    {
        $this->claDescr = $claDescr;

        return $this;
    }

    /**
     * Get claDescr
     *
     * @return string
     */
    public function getClaDescr()
    {
        return $this->claDescr;
    }

    /**
     * Set claEcheance
     *
     * @param \DateTime $claEcheance
     *
     * @return ClientsTaches
     */
    public function setClaEcheance($claEcheance)
    {
        $this->claEcheance = $claEcheance;

        return $this;
    }

    /**
     * Get claEcheance
     *
     * @return \DateTime
     */
    public function getClaEcheance()
    {
        return $this->claEcheance;
    }

    /**
     * Set claPriorite
     *
     * @param integer $claPriorite
     *
     * @return ClientsTaches
     */
    public function setClaPriorite($claPriorite)
    {
        $this->claPriorite = $claPriorite;

        return $this;
    }

    /**
     * Get claPriorite
     *
     * @return integer
     */
    public function getClaPriorite()
    {
        return $this->claPriorite;
    }

    /**
     * Set claNotifRef
     *
     * @param integer $claNotifRef
     *
     * @return ClientsTaches
     */
    public function setClaNotifRef($claNotifRef)
    {
        $this->claNotifRef = $claNotifRef;

        return $this;
    }

    /**
     * Get claNotifRef
     *
     * @return integer
     */
    public function getClaNotifRef()
    {
        return $this->claNotifRef;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ClientsTaches
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
     * @return ClientsTaches
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
     * @return ClientsTaches
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
     * @return ClientsTaches
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
     * Set cl
     *
     * @param \FunecapBundle\Entity\Clients $cl
     *
     * @return ClientsTaches
     */
    public function setCl(\FunecapBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \FunecapBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}

