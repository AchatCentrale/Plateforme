<?php

namespace FunecapBundle\Entity;

/**
 * Clients
 */
class Clients
{
    /**
     * @var integer
     */
    private $clId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var integer
     */
    private $reId;

    /**
     * @var string
     */
    private $clRef;

    /**
     * @var string
     */
    private $clRaisonsoc;

    /**
     * @var string
     */
    private $clSiret;

    /**
     * @var string
     */
    private $clAdresse1;

    /**
     * @var string
     */
    private $clAdresse2;

    /**
     * @var string
     */
    private $clCp;

    /**
     * @var string
     */
    private $clVille;

    /**
     * @var string
     */
    private $clPays;

    /**
     * @var string
     */
    private $clTel;

    /**
     * @var string
     */
    private $clFax;

    /**
     * @var string
     */
    private $clMail;

    /**
     * @var string
     */
    private $clWeb;

    /**
     * @var \DateTime
     */
    private $clDtAdhesion;

    /**
     * @var string
     */
    private $clLogo;

    /**
     * @var integer
     */
    private $clPrescript;

    /**
     * @var float
     */
    private $clTarif;

    /**
     * @var string
     */
    private $clCodePromo;

    /**
     * @var integer
     */
    private $clStatus;

    /**
     * @var string
     */
    private $clAdhesion;

    /**
     * @var integer
     */
    private $clActivite;

    /**
     * @var integer
     */
    private $clGroupe;

    /**
     * @var integer
     */
    private $clClassif;

    /**
     * @var integer
     */
    private $clEffectif;

    /**
     * @var float
     */
    private $clCa;

    /**
     * @var float
     */
    private $clMasqHa;

    /**
     * @var float
     */
    private $clMasqVt;

    /**
     * @var string
     */
    private $clTempo;

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
     * Get clId
     *
     * @return integer
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Clients
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
     * Set reId
     *
     * @param integer $reId
     *
     * @return Clients
     */
    public function setReId($reId)
    {
        $this->reId = $reId;

        return $this;
    }

    /**
     * Get reId
     *
     * @return integer
     */
    public function getReId()
    {
        return $this->reId;
    }

    /**
     * Set clRef
     *
     * @param string $clRef
     *
     * @return Clients
     */
    public function setClRef($clRef)
    {
        $this->clRef = $clRef;

        return $this;
    }

    /**
     * Get clRef
     *
     * @return string
     */
    public function getClRef()
    {
        return $this->clRef;
    }

    /**
     * Set clRaisonsoc
     *
     * @param string $clRaisonsoc
     *
     * @return Clients
     */
    public function setClRaisonsoc($clRaisonsoc)
    {
        $this->clRaisonsoc = $clRaisonsoc;

        return $this;
    }

    /**
     * Get clRaisonsoc
     *
     * @return string
     */
    public function getClRaisonsoc()
    {
        return $this->clRaisonsoc;
    }

    /**
     * Set clSiret
     *
     * @param string $clSiret
     *
     * @return Clients
     */
    public function setClSiret($clSiret)
    {
        $this->clSiret = $clSiret;

        return $this;
    }

    /**
     * Get clSiret
     *
     * @return string
     */
    public function getClSiret()
    {
        return $this->clSiret;
    }

    /**
     * Set clAdresse1
     *
     * @param string $clAdresse1
     *
     * @return Clients
     */
    public function setClAdresse1($clAdresse1)
    {
        $this->clAdresse1 = $clAdresse1;

        return $this;
    }

    /**
     * Get clAdresse1
     *
     * @return string
     */
    public function getClAdresse1()
    {
        return $this->clAdresse1;
    }

    /**
     * Set clAdresse2
     *
     * @param string $clAdresse2
     *
     * @return Clients
     */
    public function setClAdresse2($clAdresse2)
    {
        $this->clAdresse2 = $clAdresse2;

        return $this;
    }

    /**
     * Get clAdresse2
     *
     * @return string
     */
    public function getClAdresse2()
    {
        return $this->clAdresse2;
    }

    /**
     * Set clCp
     *
     * @param string $clCp
     *
     * @return Clients
     */
    public function setClCp($clCp)
    {
        $this->clCp = $clCp;

        return $this;
    }

    /**
     * Get clCp
     *
     * @return string
     */
    public function getClCp()
    {
        return $this->clCp;
    }

    /**
     * Set clVille
     *
     * @param string $clVille
     *
     * @return Clients
     */
    public function setClVille($clVille)
    {
        $this->clVille = $clVille;

        return $this;
    }

    /**
     * Get clVille
     *
     * @return string
     */
    public function getClVille()
    {
        return $this->clVille;
    }

    /**
     * Set clPays
     *
     * @param string $clPays
     *
     * @return Clients
     */
    public function setClPays($clPays)
    {
        $this->clPays = $clPays;

        return $this;
    }

    /**
     * Get clPays
     *
     * @return string
     */
    public function getClPays()
    {
        return $this->clPays;
    }

    /**
     * Set clTel
     *
     * @param string $clTel
     *
     * @return Clients
     */
    public function setClTel($clTel)
    {
        $this->clTel = $clTel;

        return $this;
    }

    /**
     * Get clTel
     *
     * @return string
     */
    public function getClTel()
    {
        return $this->clTel;
    }

    /**
     * Set clFax
     *
     * @param string $clFax
     *
     * @return Clients
     */
    public function setClFax($clFax)
    {
        $this->clFax = $clFax;

        return $this;
    }

    /**
     * Get clFax
     *
     * @return string
     */
    public function getClFax()
    {
        return $this->clFax;
    }

    /**
     * Set clMail
     *
     * @param string $clMail
     *
     * @return Clients
     */
    public function setClMail($clMail)
    {
        $this->clMail = $clMail;

        return $this;
    }

    /**
     * Get clMail
     *
     * @return string
     */
    public function getClMail()
    {
        return $this->clMail;
    }

    /**
     * Set clWeb
     *
     * @param string $clWeb
     *
     * @return Clients
     */
    public function setClWeb($clWeb)
    {
        $this->clWeb = $clWeb;

        return $this;
    }

    /**
     * Get clWeb
     *
     * @return string
     */
    public function getClWeb()
    {
        return $this->clWeb;
    }

    /**
     * Set clDtAdhesion
     *
     * @param \DateTime $clDtAdhesion
     *
     * @return Clients
     */
    public function setClDtAdhesion($clDtAdhesion)
    {
        $this->clDtAdhesion = $clDtAdhesion;

        return $this;
    }

    /**
     * Get clDtAdhesion
     *
     * @return \DateTime
     */
    public function getClDtAdhesion()
    {
        return $this->clDtAdhesion;
    }

    /**
     * Set clLogo
     *
     * @param string $clLogo
     *
     * @return Clients
     */
    public function setClLogo($clLogo)
    {
        $this->clLogo = $clLogo;

        return $this;
    }

    /**
     * Get clLogo
     *
     * @return string
     */
    public function getClLogo()
    {
        return $this->clLogo;
    }

    /**
     * Set clPrescript
     *
     * @param integer $clPrescript
     *
     * @return Clients
     */
    public function setClPrescript($clPrescript)
    {
        $this->clPrescript = $clPrescript;

        return $this;
    }

    /**
     * Get clPrescript
     *
     * @return integer
     */
    public function getClPrescript()
    {
        return $this->clPrescript;
    }

    /**
     * Set clTarif
     *
     * @param float $clTarif
     *
     * @return Clients
     */
    public function setClTarif($clTarif)
    {
        $this->clTarif = $clTarif;

        return $this;
    }

    /**
     * Get clTarif
     *
     * @return float
     */
    public function getClTarif()
    {
        return $this->clTarif;
    }

    /**
     * Set clCodePromo
     *
     * @param string $clCodePromo
     *
     * @return Clients
     */
    public function setClCodePromo($clCodePromo)
    {
        $this->clCodePromo = $clCodePromo;

        return $this;
    }

    /**
     * Get clCodePromo
     *
     * @return string
     */
    public function getClCodePromo()
    {
        return $this->clCodePromo;
    }

    /**
     * Set clStatus
     *
     * @param integer $clStatus
     *
     * @return Clients
     */
    public function setClStatus($clStatus)
    {
        $this->clStatus = $clStatus;

        return $this;
    }

    /**
     * Get clStatus
     *
     * @return integer
     */
    public function getClStatus()
    {
        return $this->clStatus;
    }

    /**
     * Set clAdhesion
     *
     * @param string $clAdhesion
     *
     * @return Clients
     */
    public function setClAdhesion($clAdhesion)
    {
        $this->clAdhesion = $clAdhesion;

        return $this;
    }

    /**
     * Get clAdhesion
     *
     * @return string
     */
    public function getClAdhesion()
    {
        return $this->clAdhesion;
    }

    /**
     * Set clActivite
     *
     * @param integer $clActivite
     *
     * @return Clients
     */
    public function setClActivite($clActivite)
    {
        $this->clActivite = $clActivite;

        return $this;
    }

    /**
     * Get clActivite
     *
     * @return integer
     */
    public function getClActivite()
    {
        return $this->clActivite;
    }

    /**
     * Set clGroupe
     *
     * @param integer $clGroupe
     *
     * @return Clients
     */
    public function setClGroupe($clGroupe)
    {
        $this->clGroupe = $clGroupe;

        return $this;
    }

    /**
     * Get clGroupe
     *
     * @return integer
     */
    public function getClGroupe()
    {
        return $this->clGroupe;
    }

    /**
     * Set clClassif
     *
     * @param integer $clClassif
     *
     * @return Clients
     */
    public function setClClassif($clClassif)
    {
        $this->clClassif = $clClassif;

        return $this;
    }

    /**
     * Get clClassif
     *
     * @return integer
     */
    public function getClClassif()
    {
        return $this->clClassif;
    }

    /**
     * Set clEffectif
     *
     * @param integer $clEffectif
     *
     * @return Clients
     */
    public function setClEffectif($clEffectif)
    {
        $this->clEffectif = $clEffectif;

        return $this;
    }

    /**
     * Get clEffectif
     *
     * @return integer
     */
    public function getClEffectif()
    {
        return $this->clEffectif;
    }

    /**
     * Set clCa
     *
     * @param float $clCa
     *
     * @return Clients
     */
    public function setClCa($clCa)
    {
        $this->clCa = $clCa;

        return $this;
    }

    /**
     * Get clCa
     *
     * @return float
     */
    public function getClCa()
    {
        return $this->clCa;
    }

    /**
     * Set clMasqHa
     *
     * @param float $clMasqHa
     *
     * @return Clients
     */
    public function setClMasqHa($clMasqHa)
    {
        $this->clMasqHa = $clMasqHa;

        return $this;
    }

    /**
     * Get clMasqHa
     *
     * @return float
     */
    public function getClMasqHa()
    {
        return $this->clMasqHa;
    }

    /**
     * Set clMasqVt
     *
     * @param float $clMasqVt
     *
     * @return Clients
     */
    public function setClMasqVt($clMasqVt)
    {
        $this->clMasqVt = $clMasqVt;

        return $this;
    }

    /**
     * Get clMasqVt
     *
     * @return float
     */
    public function getClMasqVt()
    {
        return $this->clMasqVt;
    }

    /**
     * Set clTempo
     *
     * @param string $clTempo
     *
     * @return Clients
     */
    public function setClTempo($clTempo)
    {
        $this->clTempo = $clTempo;

        return $this;
    }

    /**
     * Get clTempo
     *
     * @return string
     */
    public function getClTempo()
    {
        return $this->clTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Clients
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
     * @return Clients
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
     * @return Clients
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
     * @return Clients
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

