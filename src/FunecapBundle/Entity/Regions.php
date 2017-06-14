<?php

namespace FunecapBundle\Entity;

/**
 * Regions
 */
class Regions
{
    /**
     * @var integer
     */
    private $reId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $reNom;

    /**
     * @var string
     */
    private $rePole;

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
     * Get reId
     *
     * @return integer
     */
    public function getReId()
    {
        return $this->reId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Regions
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
     * Set reNom
     *
     * @param string $reNom
     *
     * @return Regions
     */
    public function setReNom($reNom)
    {
        $this->reNom = $reNom;

        return $this;
    }

    /**
     * Get reNom
     *
     * @return string
     */
    public function getReNom()
    {
        return $this->reNom;
    }

    /**
     * Set rePole
     *
     * @param string $rePole
     *
     * @return Regions
     */
    public function setRePole($rePole)
    {
        $this->rePole = $rePole;

        return $this;
    }

    /**
     * Get rePole
     *
     * @return string
     */
    public function getRePole()
    {
        return $this->rePole;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Regions
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
     * @return Regions
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
     * @return Regions
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
     * @return Regions
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

