<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageEntete
 *
 * @ORM\Table(name="MESSAGE_ENTETE")
 * @ORM\Entity
 */
class MessageEntete
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer", nullable=true)
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CC_ID", type="integer", nullable=true)
     */
    private $ccId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_ID", type="integer", nullable=true)
     */
    private $fcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer", nullable=true)
     */
    private $prId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ME_DATE", type="datetime", nullable=true)
     */
    private $meDate;

    /**
     * @var string
     *
     * @ORM\Column(name="ME_SUJET", type="string", length=200, nullable=true)
     */
    private $meSujet;

    /**
     * @var string
     *
     * @ORM\Column(name="ME_NOTE", type="string", length=500, nullable=true)
     */
    private $meNote;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_STATUS", type="integer", nullable=true)
     */
    private $meStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_LU_C", type="integer", nullable=true)
     */
    private $meLuC;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_LU_F", type="integer", nullable=true)
     */
    private $meLuF;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_RELANCE", type="integer", nullable=true)
     */
    private $meRelance;

    /**
     * @var string
     *
     * @ORM\Column(name="ME_TEMPO", type="string", length=50, nullable=true)
     */
    private $meTempo;

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
     * @var integer
     *
     * @ORM\Column(name="ME_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $meId;



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

    /**
     * Get meId
     *
     * @return integer
     */
    public function getMeId()
    {
        return $this->meId;
    }
}
