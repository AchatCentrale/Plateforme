<?php

namespace FunecapBundle\Entity;

/**
 * RegionsFournisseurs
 */
class RegionsFournisseurs
{
    /**
     * @var integer
     */
    private $rfId;

    /**
     * @var integer
     */
    private $reId;

    /**
     * @var integer
     */
    private $foId;

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
    private $insDate;

    /**
     * @var string
     */
    private $insUser;


    /**
     * Get rfId
     *
     * @return integer
     */
    public function getRfId()
    {
        return $this->rfId;
    }

    /**
     * Set reId
     *
     * @param integer $reId
     *
     * @return RegionsFournisseurs
     */
    public function setReId($reId)
    {
        $this->reId = $reId;

        return $this;
    }

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
     * Set foId
     *
     * @param integer $foId
     *
     * @return RegionsFournisseurs
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
     * Set fcId
     *
     * @param integer $fcId
     *
     * @return RegionsFournisseurs
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
     * @return RegionsFournisseurs
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
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return RegionsFournisseurs
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
     * @return RegionsFournisseurs
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

