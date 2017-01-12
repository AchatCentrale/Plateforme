<?php

namespace SiteBundle\Entity;

/**
 * Familles
 */
class Familles
{
    /**
     * @var string
     */
    private $faNom;

    /**
     * @var string
     */
    private $faDescr;

    /**
     * @var integer
     */
    private $faTri;

    /**
     * @var string
     */
    private $faTempo;

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
     * @var integer
     */
    private $faId;

    /**
     * @var \SiteBundle\Entity\Rayons
     */
    private $ra;


    /**
     * Set faNom
     *
     * @param string $faNom
     *
     * @return Familles
     */
    public function setFaNom($faNom)
    {
        $this->faNom = $faNom;

        return $this;
    }

    /**
     * Get faNom
     *
     * @return string
     */
    public function getFaNom()
    {
        return $this->faNom;
    }

    /**
     * Set faDescr
     *
     * @param string $faDescr
     *
     * @return Familles
     */
    public function setFaDescr($faDescr)
    {
        $this->faDescr = $faDescr;

        return $this;
    }

    /**
     * Get faDescr
     *
     * @return string
     */
    public function getFaDescr()
    {
        return $this->faDescr;
    }

    /**
     * Set faTri
     *
     * @param integer $faTri
     *
     * @return Familles
     */
    public function setFaTri($faTri)
    {
        $this->faTri = $faTri;

        return $this;
    }

    /**
     * Get faTri
     *
     * @return integer
     */
    public function getFaTri()
    {
        return $this->faTri;
    }

    /**
     * Set faTempo
     *
     * @param string $faTempo
     *
     * @return Familles
     */
    public function setFaTempo($faTempo)
    {
        $this->faTempo = $faTempo;

        return $this;
    }

    /**
     * Get faTempo
     *
     * @return string
     */
    public function getFaTempo()
    {
        return $this->faTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Familles
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
     * @return Familles
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
     * @return Familles
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
     * @return Familles
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

    /**
     * Get faId
     *
     * @return integer
     */
    public function getFaId()
    {
        return $this->faId;
    }

    /**
     * Set ra
     *
     * @param \SiteBundle\Entity\Rayons $ra
     *
     * @return Familles
     */
    public function setRa(\SiteBundle\Entity\Rayons $ra = null)
    {
        $this->ra = $ra;

        return $this;
    }

    /**
     * Get ra
     *
     * @return \SiteBundle\Entity\Rayons
     */
    public function getRa()
    {
        return $this->ra;
    }
}

