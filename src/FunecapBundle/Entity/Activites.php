<?php

namespace FunecapBundle\Entity;

/**
 * Activites
 */
class Activites
{
    /**
     * @var integer
     */
    private $acId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $acDescr;


    /**
     * Get acId
     *
     * @return integer
     */
    public function getAcId()
    {
        return $this->acId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Activites
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
     * Set acDescr
     *
     * @param string $acDescr
     *
     * @return Activites
     */
    public function setAcDescr($acDescr)
    {
        $this->acDescr = $acDescr;

        return $this;
    }

    /**
     * Get acDescr
     *
     * @return string
     */
    public function getAcDescr()
    {
        return $this->acDescr;
    }
}

