<?php

namespace FunecapBundle\Entity;

/**
 * Pays
 */
class Pays
{
    /**
     * @var integer
     */
    private $paId;

    /**
     * @var string
     */
    private $paCode;

    /**
     * @var string
     */
    private $paDescr;

    /**
     * @var string
     */
    private $paProv;


    /**
     * Get paId
     *
     * @return integer
     */
    public function getPaId()
    {
        return $this->paId;
    }

    /**
     * Set paCode
     *
     * @param string $paCode
     *
     * @return Pays
     */
    public function setPaCode($paCode)
    {
        $this->paCode = $paCode;

        return $this;
    }

    /**
     * Get paCode
     *
     * @return string
     */
    public function getPaCode()
    {
        return $this->paCode;
    }

    /**
     * Set paDescr
     *
     * @param string $paDescr
     *
     * @return Pays
     */
    public function setPaDescr($paDescr)
    {
        $this->paDescr = $paDescr;

        return $this;
    }

    /**
     * Get paDescr
     *
     * @return string
     */
    public function getPaDescr()
    {
        return $this->paDescr;
    }

    /**
     * Set paProv
     *
     * @param string $paProv
     *
     * @return Pays
     */
    public function setPaProv($paProv)
    {
        $this->paProv = $paProv;

        return $this;
    }

    /**
     * Get paProv
     *
     * @return string
     */
    public function getPaProv()
    {
        return $this->paProv;
    }
}

