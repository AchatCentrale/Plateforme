<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NousContacter
 *
 * @ORM\Table(name="NOUS_CONTACTER")
 * @ORM\Entity
 */
class NousContacter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="NC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ncId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_SOCIETE", type="string", length=50, nullable=true)
     */
    private $ncSociete;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_NOM", type="string", length=50, nullable=true)
     */
    private $ncNom;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_PRENOM", type="string", length=50, nullable=true)
     */
    private $ncPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_SIRET", type="string", length=50, nullable=true)
     */
    private $ncSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_MAIL", type="string", length=100, nullable=true)
     */
    private $ncMail;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_TEL", type="string", length=50, nullable=true)
     */
    private $ncTel;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_OBJET", type="string", length=50, nullable=true)
     */
    private $ncObjet;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_COMMENTAIRE", type="string", length=7000, nullable=true)
     */
    private $ncCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="NC_TEMPO", type="string", length=50, nullable=true)
     */
    private $ncTempo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="NC_DATE", type="datetime", nullable=true)
     */
    private $ncDate;



    /**
     * Get ncId
     *
     * @return integer
     */
    public function getNcId()
    {
        return $this->ncId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return NousContacter
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
     * Set ncSociete
     *
     * @param string $ncSociete
     *
     * @return NousContacter
     */
    public function setNcSociete($ncSociete)
    {
        $this->ncSociete = $ncSociete;

        return $this;
    }

    /**
     * Get ncSociete
     *
     * @return string
     */
    public function getNcSociete()
    {
        return $this->ncSociete;
    }

    /**
     * Set ncNom
     *
     * @param string $ncNom
     *
     * @return NousContacter
     */
    public function setNcNom($ncNom)
    {
        $this->ncNom = $ncNom;

        return $this;
    }

    /**
     * Get ncNom
     *
     * @return string
     */
    public function getNcNom()
    {
        return $this->ncNom;
    }

    /**
     * Set ncPrenom
     *
     * @param string $ncPrenom
     *
     * @return NousContacter
     */
    public function setNcPrenom($ncPrenom)
    {
        $this->ncPrenom = $ncPrenom;

        return $this;
    }

    /**
     * Get ncPrenom
     *
     * @return string
     */
    public function getNcPrenom()
    {
        return $this->ncPrenom;
    }

    /**
     * Set ncSiret
     *
     * @param string $ncSiret
     *
     * @return NousContacter
     */
    public function setNcSiret($ncSiret)
    {
        $this->ncSiret = $ncSiret;

        return $this;
    }

    /**
     * Get ncSiret
     *
     * @return string
     */
    public function getNcSiret()
    {
        return $this->ncSiret;
    }

    /**
     * Set ncMail
     *
     * @param string $ncMail
     *
     * @return NousContacter
     */
    public function setNcMail($ncMail)
    {
        $this->ncMail = $ncMail;

        return $this;
    }

    /**
     * Get ncMail
     *
     * @return string
     */
    public function getNcMail()
    {
        return $this->ncMail;
    }

    /**
     * Set ncTel
     *
     * @param string $ncTel
     *
     * @return NousContacter
     */
    public function setNcTel($ncTel)
    {
        $this->ncTel = $ncTel;

        return $this;
    }

    /**
     * Get ncTel
     *
     * @return string
     */
    public function getNcTel()
    {
        return $this->ncTel;
    }

    /**
     * Set ncObjet
     *
     * @param string $ncObjet
     *
     * @return NousContacter
     */
    public function setNcObjet($ncObjet)
    {
        $this->ncObjet = $ncObjet;

        return $this;
    }

    /**
     * Get ncObjet
     *
     * @return string
     */
    public function getNcObjet()
    {
        return $this->ncObjet;
    }

    /**
     * Set ncCommentaire
     *
     * @param string $ncCommentaire
     *
     * @return NousContacter
     */
    public function setNcCommentaire($ncCommentaire)
    {
        $this->ncCommentaire = $ncCommentaire;

        return $this;
    }

    /**
     * Get ncCommentaire
     *
     * @return string
     */
    public function getNcCommentaire()
    {
        return $this->ncCommentaire;
    }

    /**
     * Set ncTempo
     *
     * @param string $ncTempo
     *
     * @return NousContacter
     */
    public function setNcTempo($ncTempo)
    {
        $this->ncTempo = $ncTempo;

        return $this;
    }

    /**
     * Get ncTempo
     *
     * @return string
     */
    public function getNcTempo()
    {
        return $this->ncTempo;
    }

    /**
     * Set ncDate
     *
     * @param \DateTime $ncDate
     *
     * @return NousContacter
     */
    public function setNcDate($ncDate)
    {
        $this->ncDate = $ncDate;

        return $this;
    }

    /**
     * Get ncDate
     *
     * @return \DateTime
     */
    public function getNcDate()
    {
        return $this->ncDate;
    }
}
