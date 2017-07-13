<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsUsers
 *
 * @ORM\Table(name="CLIENTS_USERS", indexes={@ORM\Index(name="IDX_E2E056FD3F592A49", columns={"CL_ID"})})
 * @ORM\Entity
 */
class ClientsUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ccId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PU_ID", type="integer", nullable=true)
     */
    private $puId;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_PRENOM", type="string", length=50, nullable=true)
     */
    private $ccPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_NOM", type="string", length=50, nullable=true)
     */
    private $ccNom;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_FONCTION", type="string", length=50, nullable=true)
     */
    private $ccFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_TEL", type="string", length=50, nullable=true)
     */
    private $ccTel;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_GSM", type="string", length=50, nullable=true)
     */
    private $ccGsm;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_FAX", type="string", length=50, nullable=true)
     */
    private $ccFax;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_MAIL", type="string", length=100, nullable=true)
     */
    private $ccMail;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_PASS", type="string", length=50, nullable=true)
     */
    private $ccPass;

    /**
     * @var integer
     *
     * @ORM\Column(name="CC_NIVEAU", type="integer", nullable=true)
     */
    private $ccNiveau;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CIRCUIT_VALIDATION", type="boolean", nullable=false)
     */
    private $circuitValidation;

    /**
     * @var integer
     *
     * @ORM\Column(name="CC_STATUS", type="integer", nullable=true)
     */
    private $ccStatus;

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
     * @var \GccpBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="GccpBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CL_ID", referencedColumnName="CL_ID")
     * })
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
     * @param \GccpBundle\Entity\Clients $cl
     *
     * @return ClientsUsers
     */
    public function setCl(\GccpBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \GccpBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}
