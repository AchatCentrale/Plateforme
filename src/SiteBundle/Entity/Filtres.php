<?php

namespace SiteBundle\Entity;

/**
 * Filtres
 */
class Filtres
{
    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $fiCode;

    /**
     * @var string
     */
    private $fiValeur;

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
     * @var integer
     */
    private $fiId;


    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Filtres
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
     * Set fiCode
     *
     * @param string $fiCode
     *
     * @return Filtres
     */
    public function setFiCode($fiCode)
    {
        $this->fiCode = $fiCode;

        return $this;
    }

    /**
     * Get fiCode
     *
     * @return string
     */
    public function getFiCode()
    {
        return $this->fiCode;
    }

    /**
     * Set fiValeur
     *
     * @param string $fiValeur
     *
     * @return Filtres
     */
    public function setFiValeur($fiValeur)
    {
        $this->fiValeur = $fiValeur;

        return $this;
    }

    /**
     * Get fiValeur
     *
     * @return string
     */
    public function getFiValeur()
    {
        return $this->fiValeur;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Filtres
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
     * @return Filtres
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
     * @return Filtres
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
     * @return Filtres
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
     * Get fiId
     *
     * @return integer
     */
    public function getFiId()
    {
        return $this->fiId;
    }
}

