<?php

namespace FunecapBundle\Entity;

/**
 * MessageVentes
 */
class MessageVentes
{
    /**
     * @var integer
     */
    private $mvId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var integer
     */
    private $meId;

    /**
     * @var integer
     */
    private $mvClient;

    /**
     * @var integer
     */
    private $mvClientU;

    /**
     * @var integer
     */
    private $mvFourn;

    /**
     * @var integer
     */
    private $mvFournU;

    /**
     * @var string
     */
    private $mvSujet;

    /**
     * @var \DateTime
     */
    private $mvDtVente;

    /**
     * @var float
     */
    private $mvMontant;

    /**
     * @var float
     */
    private $mvCommisPct;

    /**
     * @var float
     */
    private $mvCommisEur;

    /**
     * @var string
     */
    private $mvComment;

    /**
     * @var integer
     */
    private $mvStatus;

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
     * Get mvId
     *
     * @return integer
     */
    public function getMvId()
    {
        return $this->mvId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return MessageVentes
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
     * Set meId
     *
     * @param integer $meId
     *
     * @return MessageVentes
     */
    public function setMeId($meId)
    {
        $this->meId = $meId;

        return $this;
    }

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
     * Set mvClient
     *
     * @param integer $mvClient
     *
     * @return MessageVentes
     */
    public function setMvClient($mvClient)
    {
        $this->mvClient = $mvClient;

        return $this;
    }

    /**
     * Get mvClient
     *
     * @return integer
     */
    public function getMvClient()
    {
        return $this->mvClient;
    }

    /**
     * Set mvClientU
     *
     * @param integer $mvClientU
     *
     * @return MessageVentes
     */
    public function setMvClientU($mvClientU)
    {
        $this->mvClientU = $mvClientU;

        return $this;
    }

    /**
     * Get mvClientU
     *
     * @return integer
     */
    public function getMvClientU()
    {
        return $this->mvClientU;
    }

    /**
     * Set mvFourn
     *
     * @param integer $mvFourn
     *
     * @return MessageVentes
     */
    public function setMvFourn($mvFourn)
    {
        $this->mvFourn = $mvFourn;

        return $this;
    }

    /**
     * Get mvFourn
     *
     * @return integer
     */
    public function getMvFourn()
    {
        return $this->mvFourn;
    }

    /**
     * Set mvFournU
     *
     * @param integer $mvFournU
     *
     * @return MessageVentes
     */
    public function setMvFournU($mvFournU)
    {
        $this->mvFournU = $mvFournU;

        return $this;
    }

    /**
     * Get mvFournU
     *
     * @return integer
     */
    public function getMvFournU()
    {
        return $this->mvFournU;
    }

    /**
     * Set mvSujet
     *
     * @param string $mvSujet
     *
     * @return MessageVentes
     */
    public function setMvSujet($mvSujet)
    {
        $this->mvSujet = $mvSujet;

        return $this;
    }

    /**
     * Get mvSujet
     *
     * @return string
     */
    public function getMvSujet()
    {
        return $this->mvSujet;
    }

    /**
     * Set mvDtVente
     *
     * @param \DateTime $mvDtVente
     *
     * @return MessageVentes
     */
    public function setMvDtVente($mvDtVente)
    {
        $this->mvDtVente = $mvDtVente;

        return $this;
    }

    /**
     * Get mvDtVente
     *
     * @return \DateTime
     */
    public function getMvDtVente()
    {
        return $this->mvDtVente;
    }

    /**
     * Set mvMontant
     *
     * @param float $mvMontant
     *
     * @return MessageVentes
     */
    public function setMvMontant($mvMontant)
    {
        $this->mvMontant = $mvMontant;

        return $this;
    }

    /**
     * Get mvMontant
     *
     * @return float
     */
    public function getMvMontant()
    {
        return $this->mvMontant;
    }

    /**
     * Set mvCommisPct
     *
     * @param float $mvCommisPct
     *
     * @return MessageVentes
     */
    public function setMvCommisPct($mvCommisPct)
    {
        $this->mvCommisPct = $mvCommisPct;

        return $this;
    }

    /**
     * Get mvCommisPct
     *
     * @return float
     */
    public function getMvCommisPct()
    {
        return $this->mvCommisPct;
    }

    /**
     * Set mvCommisEur
     *
     * @param float $mvCommisEur
     *
     * @return MessageVentes
     */
    public function setMvCommisEur($mvCommisEur)
    {
        $this->mvCommisEur = $mvCommisEur;

        return $this;
    }

    /**
     * Get mvCommisEur
     *
     * @return float
     */
    public function getMvCommisEur()
    {
        return $this->mvCommisEur;
    }

    /**
     * Set mvComment
     *
     * @param string $mvComment
     *
     * @return MessageVentes
     */
    public function setMvComment($mvComment)
    {
        $this->mvComment = $mvComment;

        return $this;
    }

    /**
     * Get mvComment
     *
     * @return string
     */
    public function getMvComment()
    {
        return $this->mvComment;
    }

    /**
     * Set mvStatus
     *
     * @param integer $mvStatus
     *
     * @return MessageVentes
     */
    public function setMvStatus($mvStatus)
    {
        $this->mvStatus = $mvStatus;

        return $this;
    }

    /**
     * Get mvStatus
     *
     * @return integer
     */
    public function getMvStatus()
    {
        return $this->mvStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return MessageVentes
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
     * @return MessageVentes
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
     * @return MessageVentes
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
     * @return MessageVentes
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

