<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersDroits
 *
 * @ORM\Table(name="USERS_DROITS", indexes={@ORM\Index(name="IDX_52C12AD2D8830FA2", columns={"US_ID"})})
 * @ORM\Entity
 */
class UsersDroits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UD_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $udId;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_EXTRANET", type="integer", nullable=true)
     */
    private $udExtranet;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_INSTUTIONNEL", type="integer", nullable=true)
     */
    private $udInstutionnel;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_PRODUIT", type="integer", nullable=true)
     */
    private $udProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_OPTIONS", type="integer", nullable=true)
     */
    private $udOptions;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_COMMISSION", type="integer", nullable=true)
     */
    private $udCommission;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_RFA_SUP", type="integer", nullable=true)
     */
    private $udRfaSup;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_CLIENT_INS", type="integer", nullable=true)
     */
    private $udClientIns;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_CLIENT_MAJ", type="integer", nullable=true)
     */
    private $udClientMaj;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_CLIENT_SUP", type="integer", nullable=true)
     */
    private $udClientSup;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_USER_INS", type="integer", nullable=true)
     */
    private $udUserIns;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_USER_MAJ", type="integer", nullable=true)
     */
    private $udUserMaj;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_USER_SUP", type="integer", nullable=true)
     */
    private $udUserSup;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_EXTRACTION", type="integer", nullable=true)
     */
    private $udExtraction;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_FOURNISSEUR", type="integer", nullable=true)
     */
    private $udFournisseur;

    /**
     * @var integer
     *
     * @ORM\Column(name="UD_COPIE_TICKET", type="integer", nullable=true)
     */
    private $udCopieTicket;

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
     * @var \PfplBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="PfplBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="US_ID", referencedColumnName="US_ID")
     * })
     */
    private $us;



    /**
     * Get udId
     *
     * @return integer
     */
    public function getUdId()
    {
        return $this->udId;
    }

    /**
     * Set udExtranet
     *
     * @param integer $udExtranet
     *
     * @return UsersDroits
     */
    public function setUdExtranet($udExtranet)
    {
        $this->udExtranet = $udExtranet;

        return $this;
    }

    /**
     * Get udExtranet
     *
     * @return integer
     */
    public function getUdExtranet()
    {
        return $this->udExtranet;
    }

    /**
     * Set udInstutionnel
     *
     * @param integer $udInstutionnel
     *
     * @return UsersDroits
     */
    public function setUdInstutionnel($udInstutionnel)
    {
        $this->udInstutionnel = $udInstutionnel;

        return $this;
    }

    /**
     * Get udInstutionnel
     *
     * @return integer
     */
    public function getUdInstutionnel()
    {
        return $this->udInstutionnel;
    }

    /**
     * Set udProduit
     *
     * @param integer $udProduit
     *
     * @return UsersDroits
     */
    public function setUdProduit($udProduit)
    {
        $this->udProduit = $udProduit;

        return $this;
    }

    /**
     * Get udProduit
     *
     * @return integer
     */
    public function getUdProduit()
    {
        return $this->udProduit;
    }

    /**
     * Set udOptions
     *
     * @param integer $udOptions
     *
     * @return UsersDroits
     */
    public function setUdOptions($udOptions)
    {
        $this->udOptions = $udOptions;

        return $this;
    }

    /**
     * Get udOptions
     *
     * @return integer
     */
    public function getUdOptions()
    {
        return $this->udOptions;
    }

    /**
     * Set udCommission
     *
     * @param integer $udCommission
     *
     * @return UsersDroits
     */
    public function setUdCommission($udCommission)
    {
        $this->udCommission = $udCommission;

        return $this;
    }

    /**
     * Get udCommission
     *
     * @return integer
     */
    public function getUdCommission()
    {
        return $this->udCommission;
    }

    /**
     * Set udRfaSup
     *
     * @param integer $udRfaSup
     *
     * @return UsersDroits
     */
    public function setUdRfaSup($udRfaSup)
    {
        $this->udRfaSup = $udRfaSup;

        return $this;
    }

    /**
     * Get udRfaSup
     *
     * @return integer
     */
    public function getUdRfaSup()
    {
        return $this->udRfaSup;
    }

    /**
     * Set udClientIns
     *
     * @param integer $udClientIns
     *
     * @return UsersDroits
     */
    public function setUdClientIns($udClientIns)
    {
        $this->udClientIns = $udClientIns;

        return $this;
    }

    /**
     * Get udClientIns
     *
     * @return integer
     */
    public function getUdClientIns()
    {
        return $this->udClientIns;
    }

    /**
     * Set udClientMaj
     *
     * @param integer $udClientMaj
     *
     * @return UsersDroits
     */
    public function setUdClientMaj($udClientMaj)
    {
        $this->udClientMaj = $udClientMaj;

        return $this;
    }

    /**
     * Get udClientMaj
     *
     * @return integer
     */
    public function getUdClientMaj()
    {
        return $this->udClientMaj;
    }

    /**
     * Set udClientSup
     *
     * @param integer $udClientSup
     *
     * @return UsersDroits
     */
    public function setUdClientSup($udClientSup)
    {
        $this->udClientSup = $udClientSup;

        return $this;
    }

    /**
     * Get udClientSup
     *
     * @return integer
     */
    public function getUdClientSup()
    {
        return $this->udClientSup;
    }

    /**
     * Set udUserIns
     *
     * @param integer $udUserIns
     *
     * @return UsersDroits
     */
    public function setUdUserIns($udUserIns)
    {
        $this->udUserIns = $udUserIns;

        return $this;
    }

    /**
     * Get udUserIns
     *
     * @return integer
     */
    public function getUdUserIns()
    {
        return $this->udUserIns;
    }

    /**
     * Set udUserMaj
     *
     * @param integer $udUserMaj
     *
     * @return UsersDroits
     */
    public function setUdUserMaj($udUserMaj)
    {
        $this->udUserMaj = $udUserMaj;

        return $this;
    }

    /**
     * Get udUserMaj
     *
     * @return integer
     */
    public function getUdUserMaj()
    {
        return $this->udUserMaj;
    }

    /**
     * Set udUserSup
     *
     * @param integer $udUserSup
     *
     * @return UsersDroits
     */
    public function setUdUserSup($udUserSup)
    {
        $this->udUserSup = $udUserSup;

        return $this;
    }

    /**
     * Get udUserSup
     *
     * @return integer
     */
    public function getUdUserSup()
    {
        return $this->udUserSup;
    }

    /**
     * Set udExtraction
     *
     * @param integer $udExtraction
     *
     * @return UsersDroits
     */
    public function setUdExtraction($udExtraction)
    {
        $this->udExtraction = $udExtraction;

        return $this;
    }

    /**
     * Get udExtraction
     *
     * @return integer
     */
    public function getUdExtraction()
    {
        return $this->udExtraction;
    }

    /**
     * Set udFournisseur
     *
     * @param integer $udFournisseur
     *
     * @return UsersDroits
     */
    public function setUdFournisseur($udFournisseur)
    {
        $this->udFournisseur = $udFournisseur;

        return $this;
    }

    /**
     * Get udFournisseur
     *
     * @return integer
     */
    public function getUdFournisseur()
    {
        return $this->udFournisseur;
    }

    /**
     * Set udCopieTicket
     *
     * @param integer $udCopieTicket
     *
     * @return UsersDroits
     */
    public function setUdCopieTicket($udCopieTicket)
    {
        $this->udCopieTicket = $udCopieTicket;

        return $this;
    }

    /**
     * Get udCopieTicket
     *
     * @return integer
     */
    public function getUdCopieTicket()
    {
        return $this->udCopieTicket;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return UsersDroits
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
     * @return UsersDroits
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
     * @return UsersDroits
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
     * @return UsersDroits
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
     * Set us
     *
     * @param \PfplBundle\Entity\Users $us
     *
     * @return UsersDroits
     */
    public function setUs(\PfplBundle\Entity\Users $us = null)
    {
        $this->us = $us;

        return $this;
    }

    /**
     * Get us
     *
     * @return \PfplBundle\Entity\Users
     */
    public function getUs()
    {
        return $this->us;
    }
}
