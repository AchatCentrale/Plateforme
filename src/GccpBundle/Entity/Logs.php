<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logs
 *
 * @ORM\Table(name="LOGS")
 * @ORM\Entity
 */
class Logs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="LO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $loId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="LO_IDENT", type="string", length=50, nullable=true)
     */
    private $loIdent;

    /**
     * @var integer
     *
     * @ORM\Column(name="LO_IDENT_NUM", type="integer", nullable=true)
     */
    private $loIdentNum;

    /**
     * @var string
     *
     * @ORM\Column(name="LO_CODE", type="string", length=50, nullable=true)
     */
    private $loCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LO_DATE", type="datetime", nullable=true)
     */
    private $loDate;

    /**
     * @var string
     *
     * @ORM\Column(name="LO_DESCR", type="string", length=5000, nullable=true)
     */
    private $loDescr;

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
     * Get loId
     *
     * @return integer
     */
    public function getLoId()
    {
        return $this->loId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Logs
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
     * Set loIdent
     *
     * @param string $loIdent
     *
     * @return Logs
     */
    public function setLoIdent($loIdent)
    {
        $this->loIdent = $loIdent;

        return $this;
    }

    /**
     * Get loIdent
     *
     * @return string
     */
    public function getLoIdent()
    {
        return $this->loIdent;
    }

    /**
     * Set loIdentNum
     *
     * @param integer $loIdentNum
     *
     * @return Logs
     */
    public function setLoIdentNum($loIdentNum)
    {
        $this->loIdentNum = $loIdentNum;

        return $this;
    }

    /**
     * Get loIdentNum
     *
     * @return integer
     */
    public function getLoIdentNum()
    {
        return $this->loIdentNum;
    }

    /**
     * Set loCode
     *
     * @param string $loCode
     *
     * @return Logs
     */
    public function setLoCode($loCode)
    {
        $this->loCode = $loCode;

        return $this;
    }

    /**
     * Get loCode
     *
     * @return string
     */
    public function getLoCode()
    {
        return $this->loCode;
    }

    /**
     * Set loDate
     *
     * @param \DateTime $loDate
     *
     * @return Logs
     */
    public function setLoDate($loDate)
    {
        $this->loDate = $loDate;

        return $this;
    }

    /**
     * Get loDate
     *
     * @return \DateTime
     */
    public function getLoDate()
    {
        return $this->loDate;
    }

    /**
     * Set loDescr
     *
     * @param string $loDescr
     *
     * @return Logs
     */
    public function setLoDescr($loDescr)
    {
        $this->loDescr = $loDescr;

        return $this;
    }

    /**
     * Get loDescr
     *
     * @return string
     */
    public function getLoDescr()
    {
        return $this->loDescr;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Logs
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
     * @return Logs
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
}
