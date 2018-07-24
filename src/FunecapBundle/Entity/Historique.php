<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique")
 * @ORM\Entity
 */
class Historique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_exp", type="string", length=255, nullable=false)
     */
    private $mailExp;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_dest", type="string", length=255, nullable=false)
     */
    private $mailDest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vdate", type="datetime", nullable=false)
     */
    private $vdate;

    /**
     * @var string
     *
     * @ORM\Column(name="code_retour", type="string", length=2000, nullable=true)
     */
    private $codeRetour;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_code_retour", type="integer", nullable=true)
     */
    private $idCodeRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="code_erreur", type="string", length=255, nullable=true)
     */
    private $codeErreur;

    /**
     * @var string
     *
     * @ORM\Column(name="SubjectMessage", type="string", length=500, nullable=true)
     */
    private $subjectmessage;

    /**
     * @var string
     *
     * @ORM\Column(name="BodyMessage", type="string", length=5000, nullable=true)
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
