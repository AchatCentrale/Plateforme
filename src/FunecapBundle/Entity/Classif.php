<?php

namespace FunecapBundle\Entity;

/**
 * Classif
 */
class Classif
{
    /**
     * @var integer
     */
    private $clId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $clDescr;


    /**
     * Get clId
     *
     * @return integer
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Classif
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
     * Set clDescr
     *
     * @param string $clDescr
     *
     * @return Classif
     */
    public function setClDescr($clDescr)
    {
        $this->clDescr = $clDescr;

        return $this;
    }

    /**
     * Get clDescr
     *
     * @return string
     */
    public function getClDescr()
    {
        return $this->clDescr;
    }
}

