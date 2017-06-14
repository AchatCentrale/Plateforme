<?php

namespace FunecapBundle\Entity;

/**
 * ClientsUsers
 */
class ClientsUsers
{
    /**
     * @var integer
     */
    private $ccId;

    /**
     * @var integer
     */
    private $puId;

    /**
     * @var string
     */
    private $ccPrenom;

    /**
     * @var string
     */
    private $ccNom;

    /**
     * @var string
     */
    private $ccFonction;

    /**
     * @var string
     */
    private $ccTel;

    /**
     * @var string
     */
    private $ccGsm;

    /**
     * @var string
     */
    private $ccFax;

    /**
     * @var string
     */
    private $ccMail;

    /**
     * @var string
     */
    private $ccPass;

    /**
     * @var integer
     */
    private $ccNiveau;

    /**
     * @var boolean
     */
    private $circuitValidation;

    /**
     * @var integer
     */
    private $ccStatus;

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
     * Get ccId
     *
     * @return integer
     */
    public function getCcId()
    {
        return $this->ccId;
    }

    /**
     * Set puId
     *
     * @param integer $puId
     *
     * @return ClientsUsers
     */
    public function setPuId($puId)
    {
        $this->puId = $puId;

        return $this;
    }

    /**
     * Get puId
     *
     * @return integer
     */
    public function getPuId()
    {
        return $this->puId;
    }

    /**
     * Set ccPrenom
     *
     * @param string $ccPrenom
     *
     * @return ClientsUsers
     */
    public function setCcPrenom($ccPrenom)
    {
        $this->ccPrenom = $ccPrenom;

        return $this;
    }

    /**
     * Get ccPrenom
     *
     * @return string
     */
    public function getCcPrenom()
    {
        return $this->ccPrenom;
    }

    /**
     * Set ccNom
     *
     * @param string $ccNom
     *
     * @return ClientsUsers
     */
    public function setCcNom($ccNom)
    {
        $this->ccNom = $ccNom;

        return $this;
    }

    /**
     * Get ccNom
     *
     * @return string
     */
    public function getCcNom()
    {
        return $this->ccNom;
    }

    /**
     * Set ccFonction
     *
     * @param string $ccFonction
     *
     * @return ClientsUsers
     */
    public function setCcFonction($ccFonction)
    {
        $this->ccFonction = $ccFonction;

        return $this;
    }

    /**
     * Get ccFonction
     *
     * @return string
     */
    public function getCcFonction()
    {
        return $this->ccFonction;
    }

    /**
     * Set ccTel
     *
     * @param string $ccTel
     *
     * @return ClientsUsers
     */
    public function setCcTel($ccTel)
    {
        $this->ccTel = $ccTel;

        return $this;
    }

    /**
     * Get ccTel
     *
     * @return string
     */
    public function getCcTel()
    {
        return $this->ccTel;
    }

    /**
     * Set ccGsm
     *
     * @param string $ccGsm
     *
     * @return ClientsUsers
     */
    public function setCcGsm($ccGsm)
    {
        $this->ccGsm = $ccGsm;

        return $this;
    }

    /**
     * Get ccGsm
     *
     * @return string
     */
    public function getCcGsm()
    {
        return $this->ccGsm;
    }

    /**
     * Set ccFax
     *
     * @param string $ccFax
     *
     * @return ClientsUsers
     */
    public function setCcFax($ccFax)
    {
        $this->ccFax = $ccFax;

        return $this;
    }

    /**
     * Get ccFax
     *
     * @return string
     */
    public function getCcFax()
    {
        return $this->ccFax;
    }

    /**
     * Set ccMail
     *
     * @param string $ccMail
     *
     * @return ClientsUsers
     */
    public function setCcMail($ccMail)
    {
        $this->ccMail = $ccMail;

        return $this;
    }

    /**
     * Get ccMail
     *
     * @return string
     */
    public function getCcMail()
    {
        return $this->ccMail;
    }

    /**
     * Set ccPass
     *
     * @param string $ccPass
     *
     * @return ClientsUsers
     */
    public function setCcPass($ccPass)
    {
        $this->ccPass = $ccPass;

        return $this;
    }

    /**
     * Get ccPass
     *
     * @return string
     */
    public function getCcPass()
    {
        return $this->ccPass;
    }

    /**
     * Set ccNiveau
     *
     * @param integer $ccNiveau
     *
     * @return ClientsUsers
     */
    public function setCcNiveau($ccNiveau)
    {
        $this->ccNiveau = $ccNiveau;

        return $this;
    }

    /**
     * Get ccNiveau
     *
     * @return integer
     */
    public function getCcNiveau()
    {
        return $this->ccNiveau;
    }

    /**
     * Set circuitValidation
     *
     * @param boolean $circuitValidation
     *
     * @return ClientsUsers
     */
    public function setCircuitValidation($circuitValidation)
    {
        $this->circuitValidation = $circuitValidation;

        return $this;
    }

    /**
     * Get circuitValidation
     *
     * @return boolean
     */
    public function getCircuitValidation()
    {
        return $this->circuitValidation;
    }

    /**
     * Set ccStatus
     *
     * @param integer $ccStatus
     *
     * @return ClientsUsers
     */
    public function setCcStatus($ccStatus)
    {
        $this->ccStatus = $ccStatus;

        return $this;
    }

    /**
     * Get ccStatus
     *
     * @return integer
     */
    public function getCcStatus()
    {
        return $this->ccStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ClientsUsers
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
     * @return ClientsUsers
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
     * @return ClientsUsers
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
     * @return ClientsUsers
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
     * @return ClientsUsers
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
}

