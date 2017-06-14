<?php

namespace FunecapBundle\Entity;

/**
 * ClientsTachesFichiers
 */
class ClientsTachesFichiers
{
    /**
     * @var integer
     */
    private $ctfId;

    /**
     * @var string
     */
    private $ctfFichier;

    /**
     * @var \DateTime
     */
    private $ctfDate;

    /**
     * @var \FunecapBundle\Entity\ClientsTaches
     */
    private $cla;


    /**
     * Get ctfId
     *
     * @return integer
     */
    public function getCtfId()
    {
        return $this->ctfId;
    }

    /**
     * Set ctfFichier
     *
     * @param string $ctfFichier
     *
     * @return ClientsTachesFichiers
     */
    public function setCtfFichier($ctfFichier)
    {
        $this->ctfFichier = $ctfFichier;

        return $this;
    }

    /**
     * Get ctfFichier
     *
     * @return string
     */
    public function getCtfFichier()
    {
        return $this->ctfFichier;
    }

    /**
     * Set ctfDate
     *
     * @param \DateTime $ctfDate
     *
     * @return ClientsTachesFichiers
     */
    public function setCtfDate($ctfDate)
    {
        $this->ctfDate = $ctfDate;

        return $this;
    }

    /**
     * Get ctfDate
     *
     * @return \DateTime
     */
    public function getCtfDate()
    {
        return $this->ctfDate;
    }

    /**
     * Set cla
     *
     * @param \FunecapBundle\Entity\ClientsTaches $cla
     *
     * @return ClientsTachesFichiers
     */
    public function setCla(\FunecapBundle\Entity\ClientsTaches $cla = null)
    {
        $this->cla = $cla;

        return $this;
    }

    /**
     * Get cla
     *
     * @return \FunecapBundle\Entity\ClientsTaches
     */
    public function getCla()
    {
        return $this->cla;
    }
}

