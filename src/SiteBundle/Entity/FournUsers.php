<?php

namespace SiteBundle\Entity;

/**
 * FournUsers
 */
class FournUsers
{
    /**
     * @var string
     */
    private $fcPrenom;

    /**
     * @var string
     */
    private $fcNom;

    /**
     * @var string
     */
    private $fcFonction;

    /**
     * @var string
     */
    private $fcTel;

    /**
     * @var string
     */
    private $fcGsm;

    /**
     * @var string
     */
    private $fcFax;

    /**
     * @var string
     */
    private $fcMail;

    /**
     * @var string
     */
    private $fcPass;

    /**
     * @var integer
     */
    private $fcNiveau;

    /**
     * @var integer
     */
    private $fcStatus;

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
     * @var integer
     */
    private $fcId;

    /**
     * @var \SiteBundle\Entity\Fournisseurs
     */
    private $fo;


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
     * Get fcId
     *
     * @return integer
     */
    public function getFcId()
    {
        return $this->fcId;
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

