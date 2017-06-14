<?php

namespace FunecapBundle\Entity;

/**
 * MessageFichiers
 */
class MessageFichiers
{
    /**
     * @var integer
     */
    private $mfId;

    /**
     * @var integer
     */
    private $mdId;

    /**
     * @var string
     */
    private $mfFichier;

    /**
     * @var float
     */
    private $mfTaille;

    /**
     * @var \DateTime
     */
    private $mfDate;

    /**
     * @var string
     */
    private $mfTempo;

    /**
     * @var \FunecapBundle\Entity\MessageEntete
     */
    private $me;


    /**
     * Get mfId
     *
     * @return integer
     */
    public function getMfId()
    {
        return $this->mfId;
    }

    /**
     * Set mdId
     *
     * @param integer $mdId
     *
     * @return MessageFichiers
     */
    public function setMdId($mdId)
    {
        $this->mdId = $mdId;

        return $this;
    }

    /**
     * Get mdId
     *
     * @return integer
     */
    public function getMdId()
    {
        return $this->mdId;
    }

    /**
     * Set mfFichier
     *
     * @param string $mfFichier
     *
     * @return MessageFichiers
     */
    public function setMfFichier($mfFichier)
    {
        $this->mfFichier = $mfFichier;

        return $this;
    }

    /**
     * Get mfFichier
     *
     * @return string
     */
    public function getMfFichier()
    {
        return $this->mfFichier;
    }

    /**
     * Set mfTaille
     *
     * @param float $mfTaille
     *
     * @return MessageFichiers
     */
    public function setMfTaille($mfTaille)
    {
        $this->mfTaille = $mfTaille;

        return $this;
    }

    /**
     * Get mfTaille
     *
     * @return float
     */
    public function getMfTaille()
    {
        return $this->mfTaille;
    }

    /**
     * Set mfDate
     *
     * @param \DateTime $mfDate
     *
     * @return MessageFichiers
     */
    public function setMfDate($mfDate)
    {
        $this->mfDate = $mfDate;

        return $this;
    }

    /**
     * Get mfDate
     *
     * @return \DateTime
     */
    public function getMfDate()
    {
        return $this->mfDate;
    }

    /**
     * Set mfTempo
     *
     * @param string $mfTempo
     *
     * @return MessageFichiers
     */
    public function setMfTempo($mfTempo)
    {
        $this->mfTempo = $mfTempo;

        return $this;
    }

    /**
     * Get mfTempo
     *
     * @return string
     */
    public function getMfTempo()
    {
        return $this->mfTempo;
    }

    /**
     * Set me
     *
     * @param \FunecapBundle\Entity\MessageEntete $me
     *
     * @return MessageFichiers
     */
    public function setMe(\FunecapBundle\Entity\MessageEntete $me = null)
    {
        $this->me = $me;

        return $this;
    }

    /**
     * Get me
     *
     * @return \FunecapBundle\Entity\MessageEntete
     */
    public function getMe()
    {
        return $this->me;
    }
}

