<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournUsers
 *
 * @ORM\Table(name="FOURN_USERS", indexes={@ORM\Index(name="IDX_D914EAADE50C0AD7", columns={"FO_ID"})})
 * @ORM\Entity
 */
class FournUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fcId;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_PRENOM", type="string", length=50, nullable=true)
     */
    private $fcPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_NOM", type="string", length=50, nullable=true)
     */
    private $fcNom;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_FONCTION", type="string", length=50, nullable=true)
     */
    private $fcFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_TEL", type="string", length=50, nullable=true)
     */
    private $fcTel;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_GSM", type="string", length=50, nullable=true)
     */
    private $fcGsm;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_FAX", type="string", length=50, nullable=true)
     */
    private $fcFax;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_MAIL", type="string", length=100, nullable=true)
     */
    private $fcMail;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_PASS", type="string", length=50, nullable=true)
     */
    private $fcPass = '123456';

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_NIVEAU", type="integer", nullable=true)
     */
    private $fcNiveau;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_STATUS", type="integer", nullable=true)
     */
    private $fcStatus;

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
     * @var \SiteBundle\Entity\Fournisseurs
     *
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FO_ID", referencedColumnName="FO_ID")
     * })
     */
    private $fo;



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
     * Set fcPrenom
     *
     * @param string $fcPrenom
     *
     * @return FournUsers
     */
    public function setFcPrenom($fcPrenom)
    {
        $this->fcPrenom = $fcPrenom;

        return $this;
    }

    /**
     * Get fcPrenom
     *
     * @return string
     */
    public function getFcPrenom()
    {
        return $this->fcPrenom;
    }

    /**
     * Set fcNom
     *
     * @param string $fcNom
     *
     * @return FournUsers
     */
    public function setFcNom($fcNom)
    {
        $this->fcNom = $fcNom;

        return $this;
    }

    /**
     * Get fcNom
     *
     * @return string
     */
    public function getFcNom()
    {
        return $this->fcNom;
    }

    /**
     * Set fcFonction
     *
     * @param string $fcFonction
     *
     * @return FournUsers
     */
    public function setFcFonction($fcFonction)
    {
        $this->fcFonction = $fcFonction;

        return $this;
    }

    /**
     * Get fcFonction
     *
     * @return string
     */
    public function getFcFonction()
    {
        return $this->fcFonction;
    }

    /**
     * Set fcTel
     *
     * @param string $fcTel
     *
     * @return FournUsers
     */
    public function setFcTel($fcTel)
    {
        $this->fcTel = $fcTel;

        return $this;
    }

    /**
     * Get fcTel
     *
     * @return string
     */
    public function getFcTel()
    {
        return $this->fcTel;
    }

    /**
     * Set fcGsm
     *
     * @param string $fcGsm
     *
     * @return FournUsers
     */
    public function setFcGsm($fcGsm)
    {
        $this->fcGsm = $fcGsm;

        return $this;
    }

    /**
     * Get fcGsm
     *
     * @return string
     */
    public function getFcGsm()
    {
        return $this->fcGsm;
    }

    /**
     * Set fcFax
     *
     * @param string $fcFax
     *
     * @return FournUsers
     */
    public function setFcFax($fcFax)
    {
        $this->fcFax = $fcFax;

        return $this;
    }

    /**
     * Get fcFax
     *
     * @return string
     */
    public function getFcFax()
    {
        return $this->fcFax;
    }

    /**
     * Set fcMail
     *
     * @param string $fcMail
     *
     * @return FournUsers
     */
    public function setFcMail($fcMail)
    {
        $this->fcMail = $fcMail;

        return $this;
    }

    /**
     * Get fcMail
     *
     * @return string
     */
    public function getFcMail()
    {
        return $this->fcMail;
    }

    /**
     * Set fcPass
     *
     * @param string $fcPass
     *
     * @return FournUsers
     */
    public function setFcPass($fcPass)
    {
        $this->fcPass = $fcPass;

        return $this;
    }

    /**
     * Get fcPass
     *
     * @return string
     */
    public function getFcPass()
    {
        return $this->fcPass;
    }

    /**
     * Set fcNiveau
     *
     * @param integer $fcNiveau
     *
     * @return FournUsers
     */
    public function setFcNiveau($fcNiveau)
    {
        $this->fcNiveau = $fcNiveau;

        return $this;
    }

    /**
     * Get fcNiveau
     *
     * @return integer
     */
    public function getFcNiveau()
    {
        return $this->fcNiveau;
    }

    /**
     * Set fcStatus
     *
     * @param integer $fcStatus
     *
     * @return FournUsers
     */
    public function setFcStatus($fcStatus)
    {
        $this->fcStatus = $fcStatus;

        return $this;
    }

    /**
     * Get fcStatus
     *
     * @return integer
     */
    public function getFcStatus()
    {
        return $this->fcStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return FournUsers
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
     * @return FournUsers
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
     * @return FournUsers
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
     * @return FournUsers
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
     * Set fo
     *
     * @param \SiteBundle\Entity\Fournisseurs $fo
     *
     * @return FournUsers
     */
    public function setFo(\SiteBundle\Entity\Fournisseurs $fo = null)
    {
        $this->fo = $fo;

        return $this;
    }

    /**
     * Get fo
     *
     * @return \SiteBundle\Entity\Fournisseurs
     */
    public function getFo()
    {
        return $this->fo;
    }
}
