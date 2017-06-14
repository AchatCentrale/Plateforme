<?php

namespace FunecapBundle\Entity;

/**
 * ContratsCat
 */
class ContratsCat
{
    /**
     * @var integer
     */
    private $ccId;

    /**
     * @var string
     */
    private $ccDescr;

    /**
     * @var \DateTime
     */
    private $ccDate;

    /**
     * @var \FunecapBundle\Entity\Societes
     */
    private $so;


    /**
     * Get ccId
     *
     * @return integer
     */
    public function getCcId()
    {
        return $this->ccId;
    }

    /**
     * Set ccDescr
     *
     * @param string $ccDescr
     *
     * @return ContratsCat
     */
    public function setCcDescr($ccDescr)
    {
        $this->ccDescr = $ccDescr;

        return $this;
    }

    /**
     * Get ccDescr
     *
     * @return string
     */
    public function getCcDescr()
    {
        return $this->ccDescr;
    }

    /**
     * Set ccDate
     *
     * @param \DateTime $ccDate
     *
     * @return ContratsCat
     */
    public function setCcDate($ccDate)
    {
        $this->ccDate = $ccDate;

        return $this;
    }

    /**
     * Get ccDate
     *
     * @return \DateTime
     */
    public function getCcDate()
    {
        return $this->ccDate;
    }

    /**
     * Set so
     *
     * @param \FunecapBundle\Entity\Societes $so
     *
     * @return ContratsCat
     */
    public function setSo(\FunecapBundle\Entity\Societes $so = null)
    {
        $this->so = $so;

        return $this;
    }

    /**
     * Get so
     *
     * @return \FunecapBundle\Entity\Societes
     */
    public function getSo()
    {
        return $this->so;
    }
}

