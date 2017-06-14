<?php

namespace FunecapBundle\Entity;

/**
 * Fonctions
 */
class Fonctions
{
    /**
     * @var integer
     */
    private $foId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $foDescr;

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
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Fonctions
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
     * Set foDescr
     *
     * @param string $foDescr
     *
     * @return Fonctions
     */
    public function setFoDescr($foDescr)
    {
        $this->foDescr = $foDescr;

        return $this;
    }

    /**
     * Get foDescr
     *
     * @return string
     */
    public function getFoDescr()
    {
        return $this->foDescr;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Fonctions
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
     * @return Fonctions
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
     * @return Fonctions
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
     * @return Fonctions
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

