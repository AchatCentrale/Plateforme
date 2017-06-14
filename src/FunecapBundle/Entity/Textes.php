<?php

namespace FunecapBundle\Entity;

/**
 * Textes
 */
class Textes
{
    /**
     * @var integer
     */
    private $txtid;

    /**
     * @var string
     */
    private $txttitre;

    /**
     * @var string
     */
    private $txtdescription;

    /**
     * @var integer
     */
    private $txtsort;

    /**
     * @var \DateTime
     */
    private $txtsortdt;

    /**
     * @var \DateTime
     */
    private $txtdate;

    /**
     * @var \FunecapBundle\Entity\Categories
     */
    private $catid;


    /**
     * Get txtid
     *
     * @return integer
     */
    public function getTxtid()
    {
        return $this->txtid;
    }

    /**
     * Set txttitre
     *
     * @param string $txttitre
     *
     * @return Textes
     */
    public function setTxttitre($txttitre)
    {
        $this->txttitre = $txttitre;

        return $this;
    }

    /**
     * Get txttitre
     *
     * @return string
     */
    public function getTxttitre()
    {
        return $this->txttitre;
    }

    /**
     * Set txtdescription
     *
     * @param string $txtdescription
     *
     * @return Textes
     */
    public function setTxtdescription($txtdescription)
    {
        $this->txtdescription = $txtdescription;

        return $this;
    }

    /**
     * Get txtdescription
     *
     * @return string
     */
    public function getTxtdescription()
    {
        return $this->txtdescription;
    }

    /**
     * Set txtsort
     *
     * @param integer $txtsort
     *
     * @return Textes
     */
    public function setTxtsort($txtsort)
    {
        $this->txtsort = $txtsort;

        return $this;
    }

    /**
     * Get txtsort
     *
     * @return integer
     */
    public function getTxtsort()
    {
        return $this->txtsort;
    }

    /**
     * Set txtsortdt
     *
     * @param \DateTime $txtsortdt
     *
     * @return Textes
     */
    public function setTxtsortdt($txtsortdt)
    {
        $this->txtsortdt = $txtsortdt;

        return $this;
    }

    /**
     * Get txtsortdt
     *
     * @return \DateTime
     */
    public function getTxtsortdt()
    {
        return $this->txtsortdt;
    }

    /**
     * Set txtdate
     *
     * @param \DateTime $txtdate
     *
     * @return Textes
     */
    public function setTxtdate($txtdate)
    {
        $this->txtdate = $txtdate;

        return $this;
    }

    /**
     * Get txtdate
     *
     * @return \DateTime
     */
    public function getTxtdate()
    {
        return $this->txtdate;
    }

    /**
     * Set catid
     *
     * @param \FunecapBundle\Entity\Categories $catid
     *
     * @return Textes
     */
    public function setCatid(\FunecapBundle\Entity\Categories $catid = null)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Get catid
     *
     * @return \FunecapBundle\Entity\Categories
     */
    public function getCatid()
    {
        return $this->catid;
    }
}

