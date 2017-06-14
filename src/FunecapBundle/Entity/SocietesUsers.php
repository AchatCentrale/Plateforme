<?php

namespace FunecapBundle\Entity;

/**
 * SocietesUsers
 */
class SocietesUsers
{
    /**
     * @var integer
     */
    private $suId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var integer
     */
    private $usId;

    /**
     * @var integer
     */
    private $suNiveau;

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
     * Get suId
     *
     * @return integer
     */
    public function getSuId()
    {
        return $this->suId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return SocietesUsers
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
     * Set usId
     *
     * @param integer $usId
     *
     * @return SocietesUsers
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
     * Set suNiveau
     *
     * @param integer $suNiveau
     *
     * @return SocietesUsers
     */
    public function setSuNiveau($suNiveau)
    {
        $this->suNiveau = $suNiveau;

        return $this;
    }

    /**
     * Get suNiveau
     *
     * @return integer
     */
    public function getSuNiveau()
    {
        return $this->suNiveau;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return SocietesUsers
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
     * @return SocietesUsers
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
     * @return SocietesUsers
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
     * @return SocietesUsers
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

