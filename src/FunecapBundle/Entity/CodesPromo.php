<?php

namespace FunecapBundle\Entity;

/**
 * CodesPromo
 */
class CodesPromo
{
    /**
     * @var integer
     */
    private $cpId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $cpCode;

    /**
     * @var float
     */
    private $cpRemise;

    /**
     * @var \DateTime
     */
    private $cpValidite;

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
     * Get cpId
     *
     * @return integer
     */
    public function getCpId()
    {
        return $this->cpId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return CodesPromo
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
     * Set cpCode
     *
     * @param string $cpCode
     *
     * @return CodesPromo
     */
    public function setCpCode($cpCode)
    {
        $this->cpCode = $cpCode;

        return $this;
    }

    /**
     * Get cpCode
     *
     * @return string
     */
    public function getCpCode()
    {
        return $this->cpCode;
    }

    /**
     * Set cpRemise
     *
     * @param float $cpRemise
     *
     * @return CodesPromo
     */
    public function setCpRemise($cpRemise)
    {
        $this->cpRemise = $cpRemise;

        return $this;
    }

    /**
     * Get cpRemise
     *
     * @return float
     */
    public function getCpRemise()
    {
        return $this->cpRemise;
    }

    /**
     * Set cpValidite
     *
     * @param \DateTime $cpValidite
     *
     * @return CodesPromo
     */
    public function setCpValidite($cpValidite)
    {
        $this->cpValidite = $cpValidite;

        return $this;
    }

    /**
     * Get cpValidite
     *
     * @return \DateTime
     */
    public function getCpValidite()
    {
        return $this->cpValidite;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return CodesPromo
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
     * @return CodesPromo
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
     * @return CodesPromo
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
     * @return CodesPromo
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

