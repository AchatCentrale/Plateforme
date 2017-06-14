<?php

namespace FunecapBundle\Entity;

/**
 * CategRayons
 */
class CategRayons
{
    /**
     * @var integer
     */
    private $crId;

    /**
     * @var integer
     */
    private $raId;

    /**
     * @var integer
     */
    private $catid;


    /**
     * Get crId
     *
     * @return integer
     */
    public function getCrId()
    {
        return $this->crId;
    }

    /**
     * Set raId
     *
     * @param integer $raId
     *
     * @return CategRayons
     */
    public function setRaId($raId)
    {
        $this->raId = $raId;

        return $this;
    }

    /**
     * Get raId
     *
     * @return integer
     */
    public function getRaId()
    {
        return $this->raId;
    }

    /**
     * Set catid
     *
     * @param integer $catid
     *
     * @return CategRayons
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Get catid
     *
     * @return integer
     */
    public function getCatid()
    {
        return $this->catid;
    }
}

