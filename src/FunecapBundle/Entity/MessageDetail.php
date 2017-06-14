<?php

namespace FunecapBundle\Entity;

/**
 * MessageDetail
 */
class MessageDetail
{
    /**
     * @var integer
     */
    private $mdId;

    /**
     * @var integer
     */
    private $ccId;

    /**
     * @var integer
     */
    private $fcId;

    /**
     * @var integer
     */
    private $usId;

    /**
     * @var \DateTime
     */
    private $mdDate;

    /**
     * @var string
     */
    private $mdCorps;

    /**
     * @var string
     */
    private $mdTempo;

    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
     */
    private $insUser;

    /**
     * @var \FunecapBundle\Entity\MessageEntete
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

