<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clients
 *
 * @ORM\Table(name="CLIENTS")
 * @ORM\Entity
 */
class Clients
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RE_ID", type="integer", nullable=true)
     */
    private $reId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CL_REF", type="string", length=50, nullable=true)
     */
    private $clRef;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_RAISONSOC", type="string", length=100, nullable=true)
     */
    private $clRaisonsoc;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_SIRET", type="string", length=14, nullable=true)
     */
    private $clSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_ADRESSE1", type="string", length=100, nullable=true)
     */
    private $clAdresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_ADRESSE2", type="string", length=100, nullable=true)
     */
    private $clAdresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_CP", type="string", length=10, nullable=true)
     */
    private $clCp;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_VILLE", type="string", length=50, nullable=true)
     */
    private $clVille;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_PAYS", type="string", length=50, nullable=true)
     */
    private $clPays;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_TEL", type="string", length=50, nullable=true)
     */
    private $clTel;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_FAX", type="string", length=50, nullable=true)
     */
    private $clFax;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_MAIL", type="string", length=100, nullable=true)
     */
    private $clMail;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_WEB", type="string", length=100, nullable=true)
     */
    private $clWeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CL_DT_ADHESION", type="datetime", nullable=true)
     */
    private $clDtAdhesion;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_LOGO", type="string", length=200, nullable=true)
     */
    private $clLogo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_PRESCRIPT", type="integer", nullable=true)
     */
    private $clPrescript = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="CL_TARIF", type="float", precision=53, scale=0, nullable=true)
     */
    private $clTarif;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_CODE_PROMO", type="string", length=50, nullable=true)
     */
    private $clCodePromo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_STATUS", type="integer", nullable=true)
     */
    private $clStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_ADHESION", type="string", length=50, nullable=true)
     */
    private $clAdhesion;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ACTIVITE", type="integer", nullable=true)
     */
    private $clActivite = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_GROUPE", type="integer", nullable=true)
     */
    private $clGroupe = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_CLASSIF", type="integer", nullable=true)
     */
    private $clClassif = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_EFFECTIF", type="integer", nullable=true)
     */
    private $clEffectif = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="CL_CA", type="float", precision=53, scale=0, nullable=true)
     */
    private $clCa = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="CL_MASQ_HA", type="float", precision=53, scale=0, nullable=true)
     */
    private $clMasqHa = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="CL_MASQ_VT", type="float", precision=53, scale=0, nullable=true)
     */
    private $clMasqVt = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="CL_TEMPO", type="string", length=50, nullable=true)
     */
    private $clTempo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_NIV_ACTION", type="integer", nullable=true)
     */
    private $clNivAction = '0';

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
     * Set clNivAction
     *
     * @param integer $clNivAction
     *
     * @return Clients
     */
    public function setClNivAction($clNivAction)
    {
        $this->clNivAction = $clNivAction;

        return $this;
    }

    /**
     * Get clNivAction
     *
     * @return integer
     */
    public function getClNivAction()
    {
        return $this->clNivAction;
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
