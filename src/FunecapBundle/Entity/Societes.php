<?php

namespace FunecapBundle\Entity;

/**
 * Societes
 */
class Societes
{
    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $soRaisonsoc;

    /**
     * @var string
     */
    private $soContact;

    /**
     * @var string
     */
    private $soAdresse1;

    /**
     * @var string
     */
    private $soAdresse2;

    /**
     * @var string
     */
    private $soCp;

    /**
     * @var string
     */
    private $soVille;

    /**
     * @var string
     */
    private $soPays;

    /**
     * @var string
     */
    private $soTel;

    /**
     * @var string
     */
    private $soPort;

    /**
     * @var string
     */
    private $soFax;

    /**
     * @var string
     */
    private $soWeb;

    /**
     * @var string
     */
    private $soMail;

    /**
     * @var string
     */
    private $soSiren;

    /**
     * @var string
     */
    private $soSiret;

    /**
     * @var string
     */
    private $soNoTva;

    /**
     * @var string
     */
    private $soType;

    /**
     * @var float
     */
    private $soCapital;

    /**
     * @var string
     */
    private $soNaf;

    /**
     * @var integer
     */
    private $soStatus;

    /**
     * @var string
     */
    private $soDatabase;

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
     * Get soId
     *
     * @return integer
     */
    public function getSoId()
    {
        return $this->soId;
    }

    /**
     * Set soRaisonsoc
     *
     * @param string $soRaisonsoc
     *
     * @return Societes
     */
    public function setSoRaisonsoc($soRaisonsoc)
    {
        $this->soRaisonsoc = $soRaisonsoc;

        return $this;
    }

    /**
     * Get soRaisonsoc
     *
     * @return string
     */
    public function getSoRaisonsoc()
    {
        return $this->soRaisonsoc;
    }

    /**
     * Set soContact
     *
     * @param string $soContact
     *
     * @return Societes
     */
    public function setSoContact($soContact)
    {
        $this->soContact = $soContact;

        return $this;
    }

    /**
     * Get soContact
     *
     * @return string
     */
    public function getSoContact()
    {
        return $this->soContact;
    }

    /**
     * Set soAdresse1
     *
     * @param string $soAdresse1
     *
     * @return Societes
     */
    public function setSoAdresse1($soAdresse1)
    {
        $this->soAdresse1 = $soAdresse1;

        return $this;
    }

    /**
     * Get soAdresse1
     *
     * @return string
     */
    public function getSoAdresse1()
    {
        return $this->soAdresse1;
    }

    /**
     * Set soAdresse2
     *
     * @param string $soAdresse2
     *
     * @return Societes
     */
    public function setSoAdresse2($soAdresse2)
    {
        $this->soAdresse2 = $soAdresse2;

        return $this;
    }

    /**
     * Get soAdresse2
     *
     * @return string
     */
    public function getSoAdresse2()
    {
        return $this->soAdresse2;
    }

    /**
     * Set soCp
     *
     * @param string $soCp
     *
     * @return Societes
     */
    public function setSoCp($soCp)
    {
        $this->soCp = $soCp;

        return $this;
    }

    /**
     * Get soCp
     *
     * @return string
     */
    public function getSoCp()
    {
        return $this->soCp;
    }

    /**
     * Set soVille
     *
     * @param string $soVille
     *
     * @return Societes
     */
    public function setSoVille($soVille)
    {
        $this->soVille = $soVille;

        return $this;
    }

    /**
     * Get soVille
     *
     * @return string
     */
    public function getSoVille()
    {
        return $this->soVille;
    }

    /**
     * Set soPays
     *
     * @param string $soPays
     *
     * @return Societes
     */
    public function setSoPays($soPays)
    {
        $this->soPays = $soPays;

        return $this;
    }

    /**
     * Get soPays
     *
     * @return string
     */
    public function getSoPays()
    {
        return $this->soPays;
    }

    /**
     * Set soTel
     *
     * @param string $soTel
     *
     * @return Societes
     */
    public function setSoTel($soTel)
    {
        $this->soTel = $soTel;

        return $this;
    }

    /**
     * Get soTel
     *
     * @return string
     */
    public function getSoTel()
    {
        return $this->soTel;
    }

    /**
     * Set soPort
     *
     * @param string $soPort
     *
     * @return Societes
     */
    public function setSoPort($soPort)
    {
        $this->soPort = $soPort;

        return $this;
    }

    /**
     * Get soPort
     *
     * @return string
     */
    public function getSoPort()
    {
        return $this->soPort;
    }

    /**
     * Set soFax
     *
     * @param string $soFax
     *
     * @return Societes
     */
    public function setSoFax($soFax)
    {
        $this->soFax = $soFax;

        return $this;
    }

    /**
     * Get soFax
     *
     * @return string
     */
    public function getSoFax()
    {
        return $this->soFax;
    }

    /**
     * Set soWeb
     *
     * @param string $soWeb
     *
     * @return Societes
     */
    public function setSoWeb($soWeb)
    {
        $this->soWeb = $soWeb;

        return $this;
    }

    /**
     * Get soWeb
     *
     * @return string
     */
    public function getSoWeb()
    {
        return $this->soWeb;
    }

    /**
     * Set soMail
     *
     * @param string $soMail
     *
     * @return Societes
     */
    public function setSoMail($soMail)
    {
        $this->soMail = $soMail;

        return $this;
    }

    /**
     * Get soMail
     *
     * @return string
     */
    public function getSoMail()
    {
        return $this->soMail;
    }

    /**
     * Set soSiren
     *
     * @param string $soSiren
     *
     * @return Societes
     */
    public function setSoSiren($soSiren)
    {
        $this->soSiren = $soSiren;

        return $this;
    }

    /**
     * Get soSiren
     *
     * @return string
     */
    public function getSoSiren()
    {
        return $this->soSiren;
    }

    /**
     * Set soSiret
     *
     * @param string $soSiret
     *
     * @return Societes
     */
    public function setSoSiret($soSiret)
    {
        $this->soSiret = $soSiret;

        return $this;
    }

    /**
     * Get soSiret
     *
     * @return string
     */
    public function getSoSiret()
    {
        return $this->soSiret;
    }

    /**
     * Set soNoTva
     *
     * @param string $soNoTva
     *
     * @return Societes
     */
    public function setSoNoTva($soNoTva)
    {
        $this->soNoTva = $soNoTva;

        return $this;
    }

    /**
     * Get soNoTva
     *
     * @return string
     */
    public function getSoNoTva()
    {
        return $this->soNoTva;
    }

    /**
     * Set soType
     *
     * @param string $soType
     *
     * @return Societes
     */
    public function setSoType($soType)
    {
        $this->soType = $soType;

        return $this;
    }

    /**
     * Get soType
     *
     * @return string
     */
    public function getSoType()
    {
        return $this->soType;
    }

    /**
     * Set soCapital
     *
     * @param float $soCapital
     *
     * @return Societes
     */
    public function setSoCapital($soCapital)
    {
        $this->soCapital = $soCapital;

        return $this;
    }

    /**
     * Get soCapital
     *
     * @return float
     */
    public function getSoCapital()
    {
        return $this->soCapital;
    }

    /**
     * Set soNaf
     *
     * @param string $soNaf
     *
     * @return Societes
     */
    public function setSoNaf($soNaf)
    {
        $this->soNaf = $soNaf;

        return $this;
    }

    /**
     * Get soNaf
     *
     * @return string
     */
    public function getSoNaf()
    {
        return $this->soNaf;
    }

    /**
     * Set soStatus
     *
     * @param integer $soStatus
     *
     * @return Societes
     */
    public function setSoStatus($soStatus)
    {
        $this->soStatus = $soStatus;

        return $this;
    }

    /**
     * Get soStatus
     *
     * @return integer
     */
    public function getSoStatus()
    {
        return $this->soStatus;
    }

    /**
     * Set soDatabase
     *
     * @param string $soDatabase
     *
     * @return Societes
     */
    public function setSoDatabase($soDatabase)
    {
        $this->soDatabase = $soDatabase;

        return $this;
    }

    /**
     * Get soDatabase
     *
     * @return string
     */
    public function getSoDatabase()
    {
        return $this->soDatabase;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Societes
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
     * @return Societes
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
     * @return Societes
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
     * @return Societes
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

