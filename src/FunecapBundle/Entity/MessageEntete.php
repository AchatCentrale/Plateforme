<?php

namespace FunecapBundle\Entity;

/**
 * MessageEntete
 */
class MessageEntete
{
    /**
     * @var integer
     */
    private $meId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var integer
     */
    private $clId;

    /**
     * @var integer
     */
    private $ccId;

    /**
     * @var integer
     */
    private $foId;

    /**
     * @var integer
     */
    private $fcId;

    /**
     * @var integer
     */
    private $prId;

    /**
     * @var \DateTime
     */
    private $meDate;

    /**
     * @var string
     */
    private $meSujet;

    /**
     * @var string
     */
    private $meNote;

    /**
     * @var integer
     */
    private $meStatus;

    /**
     * @var integer
     */
    private $meLuC;

    /**
     * @var integer
     */
    private $meLuF;

    /**
     * @var integer
     */
    private $meRelance;

    /**
     * @var integer
     */
    private $meAdrFac;

    /**
     * @var integer
     */
    private $meAdrLiv;

    /**
     * @var integer
     */
    private $meCmde;

    /**
     * @var string
     */
    private $meTempo;

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
     * Get meId
     *
     * @return integer
     */
    public function getMeId()
    {
        return $this->meId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return MessageEntete
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
     * Set clId
     *
     * @param integer $clId
     *
     * @return MessageEntete
     */
    public function setClId($clId)
    {
        $this->clId = $clId;

        return $this;
    }

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
     * Set ccId
     *
     * @param integer $ccId
     *
     * @return MessageEntete
     */
    public function setCcId($ccId)
    {
        $this->ccId = $ccId;

        return $this;
    }

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
     * Set foId
     *
     * @param integer $foId
     *
     * @return MessageEntete
     */
    public function setFoId($foId)
    {
        $this->foId = $foId;

        return $this;
    }

    /**
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set fcId
     *
     * @param integer $fcId
     *
     * @return MessageEntete
     */
    public function setFcId($fcId)
    {
        $this->fcId = $fcId;

        return $this;
    }

    /**
     * Get fcId
     *
     * @return integer
     */
    public function getFcId()
    {
        return $this->fcId;
    }

    /**
     * Set prId
     *
     * @param integer $prId
     *
     * @return MessageEntete
     */
    public function setPrId($prId)
    {
        $this->prId = $prId;

        return $this;
    }

    /**
     * Get prId
     *
     * @return integer
     */
    public function getPrId()
    {
        return $this->prId;
    }

    /**
     * Set meDate
     *
     * @param \DateTime $meDate
     *
     * @return MessageEntete
     */
    public function setMeDate($meDate)
    {
        $this->meDate = $meDate;

        return $this;
    }

    /**
     * Get meDate
     *
     * @return \DateTime
     */
    public function getMeDate()
    {
        return $this->meDate;
    }

    /**
     * Set meSujet
     *
     * @param string $meSujet
     *
     * @return MessageEntete
     */
    public function setMeSujet($meSujet)
    {
        $this->meSujet = $meSujet;

        return $this;
    }

    /**
     * Get meSujet
     *
     * @return string
     */
    public function getMeSujet()
    {
        return $this->meSujet;
    }

    /**
     * Set meNote
     *
     * @param string $meNote
     *
     * @return MessageEntete
     */
    public function setMeNote($meNote)
    {
        $this->meNote = $meNote;

        return $this;
    }

    /**
     * Get meNote
     *
     * @return string
     */
    public function getMeNote()
    {
        return $this->meNote;
    }

    /**
     * Set meStatus
     *
     * @param integer $meStatus
     *
     * @return MessageEntete
     */
    public function setMeStatus($meStatus)
    {
        $this->meStatus = $meStatus;

        return $this;
    }

    /**
     * Get meStatus
     *
     * @return integer
     */
    public function getMeStatus()
    {
        return $this->meStatus;
    }

    /**
     * Set meLuC
     *
     * @param integer $meLuC
     *
     * @return MessageEntete
     */
    public function setMeLuC($meLuC)
    {
        $this->meLuC = $meLuC;

        return $this;
    }

    /**
     * Get meLuC
     *
     * @return integer
     */
    public function getMeLuC()
    {
        return $this->meLuC;
    }

    /**
     * Set meLuF
     *
     * @param integer $meLuF
     *
     * @return MessageEntete
     */
    public function setMeLuF($meLuF)
    {
        $this->meLuF = $meLuF;

        return $this;
    }

    /**
     * Get meLuF
     *
     * @return integer
     */
    public function getMeLuF()
    {
        return $this->meLuF;
    }

    /**
     * Set meRelance
     *
     * @param integer $meRelance
     *
     * @return MessageEntete
     */
    public function setMeRelance($meRelance)
    {
        $this->meRelance = $meRelance;

        return $this;
    }

    /**
     * Get meRelance
     *
     * @return integer
     */
    public function getMeRelance()
    {
        return $this->meRelance;
    }

    /**
     * Set meAdrFac
     *
     * @param integer $meAdrFac
     *
     * @return MessageEntete
     */
    public function setMeAdrFac($meAdrFac)
    {
        $this->meAdrFac = $meAdrFac;

        return $this;
    }

    /**
     * Get meAdrFac
     *
     * @return integer
     */
    public function getMeAdrFac()
    {
        return $this->meAdrFac;
    }

    /**
     * Set meAdrLiv
     *
     * @param integer $meAdrLiv
     *
     * @return MessageEntete
     */
    public function setMeAdrLiv($meAdrLiv)
    {
        $this->meAdrLiv = $meAdrLiv;

        return $this;
    }

    /**
     * Get meAdrLiv
     *
     * @return integer
     */
    public function getMeAdrLiv()
    {
        return $this->meAdrLiv;
    }

    /**
     * Set meCmde
     *
     * @param integer $meCmde
     *
     * @return MessageEntete
     */
    public function setMeCmde($meCmde)
    {
        $this->meCmde = $meCmde;

        return $this;
    }

    /**
     * Get meCmde
     *
     * @return integer
     */
    public function getMeCmde()
    {
        return $this->meCmde;
    }

    /**
     * Set meTempo
     *
     * @param string $meTempo
     *
     * @return MessageEntete
     */
    public function setMeTempo($meTempo)
    {
        $this->meTempo = $meTempo;

        return $this;
    }

    /**
     * Get meTempo
     *
     * @return string
     */
    public function getMeTempo()
    {
        return $this->meTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return MessageEntete
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
     * @return MessageEntete
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
     * @return MessageEntete
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
     * @return MessageEntete
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
}

