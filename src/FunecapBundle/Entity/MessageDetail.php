<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageDetail
 *
 * @ORM\Table(name="MESSAGE_DETAIL", indexes={@ORM\Index(name="IDX_3DB4A13DFD61DBA2", columns={"ME_ID"})})
 * @ORM\Entity
 */
class MessageDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MD_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mdId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CC_ID", type="integer", nullable=true)
     */
    private $ccId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_ID", type="integer", nullable=true)
     */
    private $fcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="US_ID", type="integer", nullable=true)
     */
    private $usId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MD_DATE", type="datetime", nullable=true)
     */
    private $mdDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MD_CORPS", type="text", length=16, nullable=true)
     */
    private $mdCorps;

    /**
     * @var string
     *
     * @ORM\Column(name="MD_TEMPO", type="string", length=50, nullable=true)
     */
    private $mdTempo;

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
     * @var \FunecapBundle\Entity\MessageEntete
     *
     * @ORM\ManyToOne(targetEntity="FunecapBundle\Entity\MessageEntete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ME_ID", referencedColumnName="ME_ID")
     * })
     */
    private $me;



    /**
     * Get mdId
     *
     * @return integer
     */
    public function getMdId()
    {
        return $this->mdId;
    }

    /**
     * Set ccId
     *
     * @param integer $ccId
     *
     * @return MessageDetail
     */
    public function setCcId($ccId)
    {
        $this->ccId = $ccId;

        return $this;
    }

    /**
     * Get ccId
     *
     * @return integer
     */
    public function getCcId()
    {
        return $this->ccId;
    }

    /**
     * Set fcId
     *
     * @param integer $fcId
     *
     * @return MessageDetail
     */
    public function setFcId($fcId)
    {
        $this->fcId = $fcId;

        return $this;
    }

    /**
     * Get fcId
     *
     * @return integer
     */
    public function getFcId()
    {
        return $this->fcId;
    }

    /**
     * Set usId
     *
     * @param integer $usId
     *
     * @return MessageDetail
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
     * Set mdDate
     *
     * @param \DateTime $mdDate
     *
     * @return MessageDetail
     */
    public function setMdDate($mdDate)
    {
        $this->mdDate = $mdDate;

        return $this;
    }

    /**
     * Get mdDate
     *
     * @return \DateTime
     */
    public function getMdDate()
    {
        return $this->mdDate;
    }

    /**
     * Set mdCorps
     *
     * @param string $mdCorps
     *
     * @return MessageDetail
     */
    public function setMdCorps($mdCorps)
    {
        $this->mdCorps = $mdCorps;

        return $this;
    }

    /**
     * Get mdCorps
     *
     * @return string
     */
    public function getMdCorps()
    {
        return $this->mdCorps;
    }

    /**
     * Set mdTempo
     *
     * @param string $mdTempo
     *
     * @return MessageDetail
     */
    public function setMdTempo($mdTempo)
    {
        $this->mdTempo = $mdTempo;

        return $this;
    }

    /**
     * Get mdTempo
     *
     * @return string
     */
    public function getMdTempo()
    {
        return $this->mdTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return MessageDetail
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
     * @return MessageDetail
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
     * Set me
     *
     * @param \FunecapBundle\Entity\MessageEntete $me
     *
     * @return MessageDetail
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
