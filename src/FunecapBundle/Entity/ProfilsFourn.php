<?php

namespace FunecapBundle\Entity;

/**
 * ProfilsFourn
 */
class ProfilsFourn
{
    /**
     * @var integer
     */
    private $pfId;

    /**
     * @var integer
     */
    private $foId;

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
     * @var \FunecapBundle\Entity\ProfilsUsers
     */
    private $pu;


    /**
     * Get pfId
     *
     * @return integer
     */
    public function getPfId()
    {
        return $this->pfId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return ProfilsFourn
     */
    public function setFoId($foId)
    {
        $this->foId = $foId;

        return $this;
    }

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
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * Set pu
     *
     * @param \FunecapBundle\Entity\ProfilsUsers $pu
     *
     * @return ProfilsFourn
     */
    public function setPu(\FunecapBundle\Entity\ProfilsUsers $pu = null)
    {
        $this->pu = $pu;

        return $this;
    }

    /**
     * Get pu
     *
     * @return \FunecapBundle\Entity\ProfilsUsers
     */
    public function getPu()
    {
        return $this->pu;
    }
}

