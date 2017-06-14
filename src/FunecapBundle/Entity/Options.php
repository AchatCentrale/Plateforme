<?php

namespace FunecapBundle\Entity;

/**
 * Options
 */
class Options
{
    /**
     * @var integer
     */
    private $opId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $opDescr;

    /**
     * @var string
     */
    private $opFormat;


    /**
     * Get opId
     *
     * @return integer
     */
    public function getOpId()
    {
        return $this->opId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Options
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
     * Set opDescr
     *
     * @param string $opDescr
     *
     * @return Options
     */
    public function setOpDescr($opDescr)
    {
        $this->opDescr = $opDescr;

        return $this;
    }

    /**
     * Get opDescr
     *
     * @return string
     */
    public function getOpDescr()
    {
        return $this->opDescr;
    }

    /**
     * Set opFormat
     *
     * @param string $opFormat
     *
     * @return Options
     */
    public function setOpFormat($opFormat)
    {
        $this->opFormat = $opFormat;

        return $this;
    }

    /**
     * Get opFormat
     *
     * @return string
     */
    public function getOpFormat()
    {
        return $this->opFormat;
    }
}

