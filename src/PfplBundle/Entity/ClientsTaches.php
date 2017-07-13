<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsTaches
 *
 * @ORM\Table(name="CLIENTS_TACHES")
 * @ORM\Entity
 */
class ClientsTaches
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CLA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $claId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer", nullable=true)
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="US_ID", type="integer", nullable=true)
     */
    private $usId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CLA_TYPE", type="integer", nullable=true)
     */
    private $claType;

    /**
     * @var string
     *
     * @ORM\Column(name="CLA_NOM", type="string", length=50, nullable=true)
     */
    private $claNom;

    /**
     * @var string
     *
     * @ORM\Column(name="CLA_DESCR", type="text", length=-1, nullable=true)
     */
    private $claDescr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CLA_ECHEANCE", type="datetime", nullable=true)
     */
    private $claEcheance;

    /**
     * @var integer
     *
     * @ORM\Column(name="CLA_PRIORITE", type="integer", nullable=true)
     */
    private $claPriorite;

    /**
     * @var integer
     *
     * @ORM\Column(name="CLA_NOTIF_REF", type="integer", nullable=true)
     */
    private $claNotifRef;

    /**
     * @var integer
     *
     * @ORM\Column(name="CLA_STATUS", type="integer", nullable=true)
     */
    private $claStatus;

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
     * Get claId
     *
     * @return integer
     */
    public function getClaId()
    {
        return $this->claId;
    }

    /**
     * Set clId
     *
     * @param integer $clId
     *
     * @return ClientsTaches
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
     * Set claStatus
     *
     * @param integer $claStatus
     *
     * @return ClientsTaches
     */
    public function setClaStatus($claStatus)
    {
        $this->claStatus = $claStatus;

        return $this;
    }

    /**
     * Get claStatus
     *
     * @return integer
     */
    public function getClaStatus()
    {
        return $this->claStatus;
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
}
