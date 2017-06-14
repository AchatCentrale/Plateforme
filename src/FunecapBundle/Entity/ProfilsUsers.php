<?php

namespace FunecapBundle\Entity;

/**
 * ProfilsUsers
 */
class ProfilsUsers
{
    /**
     * @var integer
     */
    private $puId;

    /**
     * @var string
     */
    private $puDescr;

    /**
     * @var string
     */
    private $puPole;

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
     * Get puId
     *
     * @return integer
     */
    public function getPuId()
    {
        return $this->puId;
    }

    /**
     * Set puDescr
     *
     * @param string $puDescr
     *
     * @return ProfilsUsers
     */
    public function setPuDescr($puDescr)
    {
        $this->puDescr = $puDescr;

        return $this;
    }

    /**
     * Get puDescr
     *
     * @return string
     */
    public function getPuDescr()
    {
        return $this->puDescr;
    }

    /**
     * Set puPole
     *
     * @param string $puPole
     *
     * @return ProfilsUsers
     */
    public function setPuPole($puPole)
    {
        $this->puPole = $puPole;

        return $this;
    }

    /**
     * Get puPole
     *
     * @return string
     */
    public function getPuPole()
    {
        return $this->puPole;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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

