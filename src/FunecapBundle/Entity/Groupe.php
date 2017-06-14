<?php

namespace FunecapBundle\Entity;

/**
 * Groupe
 */
class Groupe
{
    /**
     * @var integer
     */
    private $grId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $grDescr;


    /**
     * Get grId
     *
     * @return integer
     */
    public function getGrId()
    {
        return $this->grId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Groupe
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
     * Set grDescr
     *
     * @param string $grDescr
     *
     * @return Groupe
     */
    public function setGrDescr($grDescr)
    {
        $this->grDescr = $grDescr;

        return $this;
    }

    /**
     * Get grDescr
     *
     * @return string
     */
    public function getGrDescr()
    {
        return $this->grDescr;
    }
}

