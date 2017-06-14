<?php

namespace FunecapBundle\Entity;

/**
 * Historique
 */
class Historique
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $mailExp;

    /**
     * @var string
     */
    private $mailDest;

    /**
     * @var \DateTime
     */
    private $vdate;

    /**
     * @var string
     */
    private $codeRetour;

    /**
     * @var integer
     */
    private $idCodeRetour;

    /**
     * @var string
     */
    private $codeErreur;

    /**
     * @var string
     */
    private $subjectmessage;

    /**
     * @var string
     */
    private $bodymessage;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mailExp
     *
     * @param string $mailExp
     *
     * @return Historique
     */
    public function setMailExp($mailExp)
    {
        $this->mailExp = $mailExp;

        return $this;
    }

    /**
     * Get mailExp
     *
     * @return string
     */
    public function getMailExp()
    {
        return $this->mailExp;
    }

    /**
     * Set mailDest
     *
     * @param string $mailDest
     *
     * @return Historique
     */
    public function setMailDest($mailDest)
    {
        $this->mailDest = $mailDest;

        return $this;
    }

    /**
     * Get mailDest
     *
     * @return string
     */
    public function getMailDest()
    {
        return $this->mailDest;
    }

    /**
     * Set vdate
     *
     * @param \DateTime $vdate
     *
     * @return Historique
     */
    public function setVdate($vdate)
    {
        $this->vdate = $vdate;

        return $this;
    }

    /**
     * Get vdate
     *
     * @return \DateTime
     */
    public function getVdate()
    {
        return $this->vdate;
    }

    /**
     * Set codeRetour
     *
     * @param string $codeRetour
     *
     * @return Historique
     */
    public function setCodeRetour($codeRetour)
    {
        $this->codeRetour = $codeRetour;

        return $this;
    }

    /**
     * Get codeRetour
     *
     * @return string
     */
    public function getCodeRetour()
    {
        return $this->codeRetour;
    }

    /**
     * Set idCodeRetour
     *
     * @param integer $idCodeRetour
     *
     * @return Historique
     */
    public function setIdCodeRetour($idCodeRetour)
    {
        $this->idCodeRetour = $idCodeRetour;

        return $this;
    }

    /**
     * Get idCodeRetour
     *
     * @return integer
     */
    public function getIdCodeRetour()
    {
        return $this->idCodeRetour;
    }

    /**
     * Set codeErreur
     *
     * @param string $codeErreur
     *
     * @return Historique
     */
    public function setCodeErreur($codeErreur)
    {
        $this->codeErreur = $codeErreur;

        return $this;
    }

    /**
     * Get codeErreur
     *
     * @return string
     */
    public function getCodeErreur()
    {
        return $this->codeErreur;
    }

    /**
     * Set subjectmessage
     *
     * @param string $subjectmessage
     *
     * @return Historique
     */
    public function setSubjectmessage($subjectmessage)
    {
        $this->subjectmessage = $subjectmessage;

        return $this;
    }

    /**
     * Get subjectmessage
     *
     * @return string
     */
    public function getSubjectmessage()
    {
        return $this->subjectmessage;
    }

    /**
     * Set bodymessage
     *
     * @param string $bodymessage
     *
     * @return Historique
     */
    public function setBodymessage($bodymessage)
    {
        $this->bodymessage = $bodymessage;

        return $this;
    }

    /**
     * Get bodymessage
     *
     * @return string
     */
    public function getBodymessage()
    {
        return $this->bodymessage;
    }
}

