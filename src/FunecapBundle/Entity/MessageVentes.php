<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageVentes
 *
 * @ORM\Table(name="MESSAGE_VENTES")
 * @ORM\Entity
 */
class MessageVentes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MV_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mvId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_ID", type="integer", nullable=true)
     */
    private $meId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MV_CLIENT", type="integer", nullable=true)
     */
    private $mvClient = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MV_CLIENT_U", type="integer", nullable=true)
     */
    private $mvClientU = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MV_FOURN", type="integer", nullable=true)
     */
    private $mvFourn = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="MV_FOURN_U", type="integer", nullable=true)
     */
    private $mvFournU = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="MV_SUJET", type="string", length=200, nullable=true)
     */
    private $mvSujet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MV_DT_VENTE", type="datetime", nullable=true)
     */
    private $mvDtVente;

    /**
     * @var float
     *
     * @ORM\Column(name="MV_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $mvMontant;

    /**
     * @var float
     *
     * @ORM\Column(name="MV_COMMIS_PCT", type="float", precision=53, scale=0, nullable=true)
     */
    private $mvCommisPct;

    /**
     * @var float
     *
     * @ORM\Column(name="MV_COMMIS_EUR", type="float", precision=53, scale=0, nullable=true)
     */
    private $mvCommisEur;

    /**
     * @var string
     *
     * @ORM\Column(name="MV_COMMENT", type="text", length=16, nullable=true)
     */
    private $mvComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="MV_STATUS", type="integer", nullable=true)
     */
    private $mvStatus = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="INS_DATE", type="datetime", nullable=true)
     */
    private $insDate;

    /**
     * @var string
     *
     * @ORM\Column(name="INS_USER", type="string", length=100, nullable=true)
     */
    private $insUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MAJ_DATE", type="datetime", nullable=true)
     */
    private $majDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MAJ_USER", type="string", length=100, nullable=true)
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
