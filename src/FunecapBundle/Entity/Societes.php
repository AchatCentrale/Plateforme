<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Societes
 *
 * @ORM\Table(name="SOCIETES")
 * @ORM\Entity
 */
class Societes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_RAISONSOC", type="string", length=50, nullable=true)
     */
    private $soRaisonsoc;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_CONTACT", type="string", length=50, nullable=true)
     */
    private $soContact;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_ADRESSE1", type="string", length=50, nullable=true)
     */
    private $soAdresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_ADRESSE2", type="string", length=50, nullable=true)
     */
    private $soAdresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_CP", type="string", length=50, nullable=true)
     */
    private $soCp;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_VILLE", type="string", length=50, nullable=true)
     */
    private $soVille;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_PAYS", type="string", length=50, nullable=true)
     */
    private $soPays;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_TEL", type="string", length=50, nullable=true)
     */
    private $soTel;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_PORT", type="string", length=50, nullable=true)
     */
    private $soPort;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_FAX", type="string", length=50, nullable=true)
     */
    private $soFax;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_WEB", type="string", length=100, nullable=true)
     */
    private $soWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_MAIL", type="string", length=100, nullable=true)
     */
    private $soMail;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_SIREN", type="string", length=50, nullable=true)
     */
    private $soSiren;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_SIRET", type="string", length=50, nullable=true)
     */
    private $soSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_NO_TVA", type="string", length=50, nullable=true)
     */
    private $soNoTva;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_TYPE", type="string", length=50, nullable=true)
     */
    private $soType;

    /**
     * @var float
     *
     * @ORM\Column(name="SO_CAPITAL", type="float", precision=53, scale=0, nullable=true)
     */
    private $soCapital;

    /**
     * @var string
     *
     * @ORM\Column(name="SO_NAF", type="string", length=50, nullable=true)
     */
    private $soNaf;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_STATUS", type="integer", nullable=true)
     */
    private $soStatus = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SO_DATABASE", type="string", length=50, nullable=true)
     */
    private $soDatabase;

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
