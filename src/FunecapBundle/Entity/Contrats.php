<?php

namespace FunecapBundle\Entity;

/**
 * Contrats
 */
class Contrats
{
    /**
     * @var integer
     */
    private $coId;

    /**
     * @var integer
     */
    private $coUser;

    /**
     * @var string
     */
    private $coTier;

    /**
     * @var string
     */
    private $coDescr;

    /**
     * @var \DateTime
     */
    private $coDebut;

    /**
     * @var \DateTime
     */
    private $coRenouv;

    /**
     * @var integer
     */
    private $coDuree;

    /**
     * @var integer
     */
    private $coPreavis;

    /**
     * @var string
     */
    private $coContact;

    /**
     * @var string
     */
    private $coContTel;

    /**
     * @var string
     */
    private $coContMail;

    /**
     * @var integer
     */
    private $coConfident;

    /**
     * @var float
     */
    private $coMontant;

    /**
     * @var string
     */
    private $coEcheance;

    /**
     * @var string
     */
    private $coModePaie;

    /**
     * @var string
     */
    private $coComment;

    /**
     * @var integer
     */
    private $coStatus;

    /**
     * @var integer
     */
    private $coAlert;

    /**
     * @var string
     */
    private $coTempo;

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
     * @var \FunecapBundle\Entity\Clients
     */
    private $cl;

    /**
     * @var \FunecapBundle\Entity\ContratsCat
     */
    private $coCategorie;


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

    /**
     * Set cl
     *
     * @param \FunecapBundle\Entity\Clients $cl
     *
     * @return Contrats
     */
    public function setCl(\FunecapBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \FunecapBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }

    /**
     * Set coCategorie
     *
     * @param \FunecapBundle\Entity\ContratsCat $coCategorie
     *
     * @return Contrats
     */
    public function setCoCategorie(\FunecapBundle\Entity\ContratsCat $coCategorie = null)
    {
        $this->coCategorie = $coCategorie;

        return $this;
    }

    /**
     * Get coCategorie
     *
     * @return \FunecapBundle\Entity\ContratsCat
     */
    public function getCoCategorie()
    {
        return $this->coCategorie;
    }
}

