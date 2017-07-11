<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrats
 *
 * @ORM\Table(name="CONTRATS")
 * @ORM\Entity
 */
class Contrats
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer", nullable=true)
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_USER", type="integer", nullable=true)
     */
    private $coUser = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_CATEGORIE", type="integer", nullable=true)
     */
    private $coCategorie = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CO_TIER", type="string", length=100, nullable=true)
     */
    private $coTier;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_DESCR", type="string", length=200, nullable=true)
     */
    private $coDescr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CO_DEBUT", type="datetime", nullable=true)
     */
    private $coDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CO_RENOUV", type="datetime", nullable=true)
     */
    private $coRenouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_DUREE", type="integer", nullable=true)
     */
    private $coDuree = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_PREAVIS", type="integer", nullable=true)
     */
    private $coPreavis = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CO_CONTACT", type="string", length=100, nullable=true)
     */
    private $coContact;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_CONT_TEL", type="string", length=50, nullable=true)
     */
    private $coContTel;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_CONT_MAIL", type="string", length=200, nullable=true)
     */
    private $coContMail;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_CONFIDENT", type="integer", nullable=true)
     */
    private $coConfident = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="CO_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $coMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_ECHEANCE", type="string", length=50, nullable=true)
     */
    private $coEcheance;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_MODE_PAIE", type="string", length=50, nullable=true)
     */
    private $coModePaie;

    /**
     * @var string
     *
     * @ORM\Column(name="CO_COMMENT", type="text", length=16, nullable=true)
     */
    private $coComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_STATUS", type="integer", nullable=true)
     */
    private $coStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ALERT", type="integer", nullable=true)
     */
    private $coAlert = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CO_TEMPO", type="string", length=50, nullable=true)
     */
    private $coTempo;

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
     * Get coId
     *
     * @return integer
     */
    public function getCoId()
    {
        return $this->coId;
    }

    /**
     * Set clId
     *
     * @param integer $clId
     *
     * @return Contrats
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
     * Set coUser
     *
     * @param integer $coUser
     *
     * @return Contrats
     */
    public function setCoUser($coUser)
    {
        $this->coUser = $coUser;

        return $this;
    }

    /**
     * Get coUser
     *
     * @return integer
     */
    public function getCoUser()
    {
        return $this->coUser;
    }

    /**
     * Set coCategorie
     *
     * @param integer $coCategorie
     *
     * @return Contrats
     */
    public function setCoCategorie($coCategorie)
    {
        $this->coCategorie = $coCategorie;

        return $this;
    }

    /**
     * Get coCategorie
     *
     * @return integer
     */
    public function getCoCategorie()
    {
        return $this->coCategorie;
    }

    /**
     * Set coTier
     *
     * @param string $coTier
     *
     * @return Contrats
     */
    public function setCoTier($coTier)
    {
        $this->coTier = $coTier;

        return $this;
    }

    /**
     * Get coTier
     *
     * @return string
     */
    public function getCoTier()
    {
        return $this->coTier;
    }

    /**
     * Set coDescr
     *
     * @param string $coDescr
     *
     * @return Contrats
     */
    public function setCoDescr($coDescr)
    {
        $this->coDescr = $coDescr;

        return $this;
    }

    /**
     * Get coDescr
     *
     * @return string
     */
    public function getCoDescr()
    {
        return $this->coDescr;
    }

    /**
     * Set coDebut
     *
     * @param \DateTime $coDebut
     *
     * @return Contrats
     */
    public function setCoDebut($coDebut)
    {
        $this->coDebut = $coDebut;

        return $this;
    }

    /**
     * Get coDebut
     *
     * @return \DateTime
     */
    public function getCoDebut()
    {
        return $this->coDebut;
    }

    /**
     * Set coRenouv
     *
     * @param \DateTime $coRenouv
     *
     * @return Contrats
     */
    public function setCoRenouv($coRenouv)
    {
        $this->coRenouv = $coRenouv;

        return $this;
    }

    /**
     * Get coRenouv
     *
     * @return \DateTime
     */
    public function getCoRenouv()
    {
        return $this->coRenouv;
    }

    /**
     * Set coDuree
     *
     * @param integer $coDuree
     *
     * @return Contrats
     */
    public function setCoDuree($coDuree)
    {
        $this->coDuree = $coDuree;

        return $this;
    }

    /**
     * Get coDuree
     *
     * @return integer
     */
    public function getCoDuree()
    {
        return $this->coDuree;
    }

    /**
     * Set coPreavis
     *
     * @param integer $coPreavis
     *
     * @return Contrats
     */
    public function setCoPreavis($coPreavis)
    {
        $this->coPreavis = $coPreavis;

        return $this;
    }

    /**
     * Get coPreavis
     *
     * @return integer
     */
    public function getCoPreavis()
    {
        return $this->coPreavis;
    }

    /**
     * Set coContact
     *
     * @param string $coContact
     *
     * @return Contrats
     */
    public function setCoContact($coContact)
    {
        $this->coContact = $coContact;

        return $this;
    }

    /**
     * Get coContact
     *
     * @return string
     */
    public function getCoContact()
    {
        return $this->coContact;
    }

    /**
     * Set coContTel
     *
     * @param string $coContTel
     *
     * @return Contrats
     */
    public function setCoContTel($coContTel)
    {
        $this->coContTel = $coContTel;

        return $this;
    }

    /**
     * Get coContTel
     *
     * @return string
     */
    public function getCoContTel()
    {
        return $this->coContTel;
    }

    /**
     * Set coContMail
     *
     * @param string $coContMail
     *
     * @return Contrats
     */
    public function setCoContMail($coContMail)
    {
        $this->coContMail = $coContMail;

        return $this;
    }

    /**
     * Get coContMail
     *
     * @return string
     */
    public function getCoContMail()
    {
        return $this->coContMail;
    }

    /**
     * Set coConfident
     *
     * @param integer $coConfident
     *
     * @return Contrats
     */
    public function setCoConfident($coConfident)
    {
        $this->coConfident = $coConfident;

        return $this;
    }

    /**
     * Get coConfident
     *
     * @return integer
     */
    public function getCoConfident()
    {
        return $this->coConfident;
    }

    /**
     * Set coMontant
     *
     * @param float $coMontant
     *
     * @return Contrats
     */
    public function setCoMontant($coMontant)
    {
        $this->coMontant = $coMontant;

        return $this;
    }

    /**
     * Get coMontant
     *
     * @return float
     */
    public function getCoMontant()
    {
        return $this->coMontant;
    }

    /**
     * Set coEcheance
     *
     * @param string $coEcheance
     *
     * @return Contrats
     */
    public function setCoEcheance($coEcheance)
    {
        $this->coEcheance = $coEcheance;

        return $this;
    }

    /**
     * Get coEcheance
     *
     * @return string
     */
    public function getCoEcheance()
    {
        return $this->coEcheance;
    }

    /**
     * Set coModePaie
     *
     * @param string $coModePaie
     *
     * @return Contrats
     */
    public function setCoModePaie($coModePaie)
    {
        $this->coModePaie = $coModePaie;

        return $this;
    }

    /**
     * Get coModePaie
     *
     * @return string
     */
    public function getCoModePaie()
    {
        return $this->coModePaie;
    }

    /**
     * Set coComment
     *
     * @param string $coComment
     *
     * @return Contrats
     */
    public function setCoComment($coComment)
    {
        $this->coComment = $coComment;

        return $this;
    }

    /**
     * Get coComment
     *
     * @return string
     */
    public function getCoComment()
    {
        return $this->coComment;
    }

    /**
     * Set coStatus
     *
     * @param integer $coStatus
     *
     * @return Contrats
     */
    public function setCoStatus($coStatus)
    {
        $this->coStatus = $coStatus;

        return $this;
    }

    /**
     * Get coStatus
     *
     * @return integer
     */
    public function getCoStatus()
    {
        return $this->coStatus;
    }

    /**
     * Set coAlert
     *
     * @param integer $coAlert
     *
     * @return Contrats
     */
    public function setCoAlert($coAlert)
    {
        $this->coAlert = $coAlert;

        return $this;
    }

    /**
     * Get coAlert
     *
     * @return integer
     */
    public function getCoAlert()
    {
        return $this->coAlert;
    }

    /**
     * Set coTempo
     *
     * @param string $coTempo
     *
     * @return Contrats
     */
    public function setCoTempo($coTempo)
    {
        $this->coTempo = $coTempo;

        return $this;
    }

    /**
     * Get coTempo
     *
     * @return string
     */
    public function getCoTempo()
    {
        return $this->coTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Contrats
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
     * @return Contrats
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
     * @return Contrats
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
     * @return Contrats
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
