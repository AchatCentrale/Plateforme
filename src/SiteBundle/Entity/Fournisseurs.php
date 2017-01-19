<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseurs
 *
 * @ORM\Table(name="FOURNISSEURS")
 * @ORM\Entity
 */
class Fournisseurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_REF", type="string", length=50, nullable=true)
     */
    private $foRef;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_RAISONSOC", type="string", length=100, nullable=true)
     */
    private $foRaisonsoc;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_SIRET", type="string", length=14, nullable=true)
     */
    private $foSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_NOM_COM", type="string", length=50, nullable=true)
     */
    private $foNomCom;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_ADRESSE1", type="string", length=100, nullable=true)
     */
    private $foAdresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_ADRESSE2", type="string", length=100, nullable=true)
     */
    private $foAdresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_CP", type="string", length=10, nullable=true)
     */
    private $foCp;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_VILLE", type="string", length=50, nullable=true)
     */
    private $foVille;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_PAYS", type="string", length=50, nullable=true)
     */
    private $foPays;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_TEL", type="string", length=50, nullable=true)
     */
    private $foTel;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_FAX", type="string", length=50, nullable=true)
     */
    private $foFax;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_MAIL", type="string", length=100, nullable=true)
     */
    private $foMail;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_WEB", type="string", length=100, nullable=true)
     */
    private $foWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_LOGO", type="string", length=200, nullable=true)
     */
    private $foLogo;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_COMM", type="float", precision=53, scale=0, nullable=true)
     */
    private $foComm = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="FO_RFA_SUP", type="float", precision=53, scale=0, nullable=true)
     */
    private $foRfaSup;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_STATUS", type="integer", nullable=true)
     */
    private $foStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_TEMPO", type="string", length=50, nullable=true)
     */
    private $foTempo;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_PORT_PAYANT_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $foPortPayantMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_PORT_PAYANT_TEXTE", type="string", length=100, nullable=true)
     */
    private $foPortPayantTexte;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_PORT_OFFERT_QTE", type="integer", nullable=true)
     */
    private $foPortOffertQte;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_PORT_OFFERT_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $foPortOffertMontant;

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
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Fournisseurs
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
     * Set foRef
     *
     * @param string $foRef
     *
     * @return Fournisseurs
     */
    public function setFoRef($foRef)
    {
        $this->foRef = $foRef;

        return $this;
    }

    /**
     * Get foRef
     *
     * @return string
     */
    public function getFoRef()
    {
        return $this->foRef;
    }

    /**
     * Set foRaisonsoc
     *
     * @param string $foRaisonsoc
     *
     * @return Fournisseurs
     */
    public function setFoRaisonsoc($foRaisonsoc)
    {
        $this->foRaisonsoc = $foRaisonsoc;

        return $this;
    }

    /**
     * Get foRaisonsoc
     *
     * @return string
     */
    public function getFoRaisonsoc()
    {
        return $this->foRaisonsoc;
    }

    /**
     * Set foSiret
     *
     * @param string $foSiret
     *
     * @return Fournisseurs
     */
    public function setFoSiret($foSiret)
    {
        $this->foSiret = $foSiret;

        return $this;
    }

    /**
     * Get foSiret
     *
     * @return string
     */
    public function getFoSiret()
    {
        return $this->foSiret;
    }

    /**
     * Set foNomCom
     *
     * @param string $foNomCom
     *
     * @return Fournisseurs
     */
    public function setFoNomCom($foNomCom)
    {
        $this->foNomCom = $foNomCom;

        return $this;
    }

    /**
     * Get foNomCom
     *
     * @return string
     */
    public function getFoNomCom()
    {
        return $this->foNomCom;
    }

    /**
     * Set foAdresse1
     *
     * @param string $foAdresse1
     *
     * @return Fournisseurs
     */
    public function setFoAdresse1($foAdresse1)
    {
        $this->foAdresse1 = $foAdresse1;

        return $this;
    }

    /**
     * Get foAdresse1
     *
     * @return string
     */
    public function getFoAdresse1()
    {
        return $this->foAdresse1;
    }

    /**
     * Set foAdresse2
     *
     * @param string $foAdresse2
     *
     * @return Fournisseurs
     */
    public function setFoAdresse2($foAdresse2)
    {
        $this->foAdresse2 = $foAdresse2;

        return $this;
    }

    /**
     * Get foAdresse2
     *
     * @return string
     */
    public function getFoAdresse2()
    {
        return $this->foAdresse2;
    }

    /**
     * Set foCp
     *
     * @param string $foCp
     *
     * @return Fournisseurs
     */
    public function setFoCp($foCp)
    {
        $this->foCp = $foCp;

        return $this;
    }

    /**
     * Get foCp
     *
     * @return string
     */
    public function getFoCp()
    {
        return $this->foCp;
    }

    /**
     * Set foVille
     *
     * @param string $foVille
     *
     * @return Fournisseurs
     */
    public function setFoVille($foVille)
    {
        $this->foVille = $foVille;

        return $this;
    }

    /**
     * Get foVille
     *
     * @return string
     */
    public function getFoVille()
    {
        return $this->foVille;
    }

    /**
     * Set foPays
     *
     * @param string $foPays
     *
     * @return Fournisseurs
     */
    public function setFoPays($foPays)
    {
        $this->foPays = $foPays;

        return $this;
    }

    /**
     * Get foPays
     *
     * @return string
     */
    public function getFoPays()
    {
        return $this->foPays;
    }

    /**
     * Set foTel
     *
     * @param string $foTel
     *
     * @return Fournisseurs
     */
    public function setFoTel($foTel)
    {
        $this->foTel = $foTel;

        return $this;
    }

    /**
     * Get foTel
     *
     * @return string
     */
    public function getFoTel()
    {
        return $this->foTel;
    }

    /**
     * Set foFax
     *
     * @param string $foFax
     *
     * @return Fournisseurs
     */
    public function setFoFax($foFax)
    {
        $this->foFax = $foFax;

        return $this;
    }

    /**
     * Get foFax
     *
     * @return string
     */
    public function getFoFax()
    {
        return $this->foFax;
    }

    /**
     * Set foMail
     *
     * @param string $foMail
     *
     * @return Fournisseurs
     */
    public function setFoMail($foMail)
    {
        $this->foMail = $foMail;

        return $this;
    }

    /**
     * Get foMail
     *
     * @return string
     */
    public function getFoMail()
    {
        return $this->foMail;
    }

    /**
     * Set foWeb
     *
     * @param string $foWeb
     *
     * @return Fournisseurs
     */
    public function setFoWeb($foWeb)
    {
        $this->foWeb = $foWeb;

        return $this;
    }

    /**
     * Get foWeb
     *
     * @return string
     */
    public function getFoWeb()
    {
        return $this->foWeb;
    }

    /**
     * Set foLogo
     *
     * @param string $foLogo
     *
     * @return Fournisseurs
     */
    public function setFoLogo($foLogo)
    {
        $this->foLogo = $foLogo;

        return $this;
    }

    /**
     * Get foLogo
     *
     * @return string
     */
    public function getFoLogo()
    {
        return $this->foLogo;
    }

    /**
     * Set foComm
     *
     * @param float $foComm
     *
     * @return Fournisseurs
     */
    public function setFoComm($foComm)
    {
        $this->foComm = $foComm;

        return $this;
    }

    /**
     * Get foComm
     *
     * @return float
     */
    public function getFoComm()
    {
        return $this->foComm;
    }

    /**
     * Set foRfaSup
     *
     * @param float $foRfaSup
     *
     * @return Fournisseurs
     */
    public function setFoRfaSup($foRfaSup)
    {
        $this->foRfaSup = $foRfaSup;

        return $this;
    }

    /**
     * Get foRfaSup
     *
     * @return float
     */
    public function getFoRfaSup()
    {
        return $this->foRfaSup;
    }

    /**
     * Set foStatus
     *
     * @param integer $foStatus
     *
     * @return Fournisseurs
     */
    public function setFoStatus($foStatus)
    {
        $this->foStatus = $foStatus;

        return $this;
    }

    /**
     * Get foStatus
     *
     * @return integer
     */
    public function getFoStatus()
    {
        return $this->foStatus;
    }

    /**
     * Set foTempo
     *
     * @param string $foTempo
     *
     * @return Fournisseurs
     */
    public function setFoTempo($foTempo)
    {
        $this->foTempo = $foTempo;

        return $this;
    }

    /**
     * Get foTempo
     *
     * @return string
     */
    public function getFoTempo()
    {
        return $this->foTempo;
    }

    /**
     * Set foPortPayantMontant
     *
     * @param float $foPortPayantMontant
     *
     * @return Fournisseurs
     */
    public function setFoPortPayantMontant($foPortPayantMontant)
    {
        $this->foPortPayantMontant = $foPortPayantMontant;

        return $this;
    }

    /**
     * Get foPortPayantMontant
     *
     * @return float
     */
    public function getFoPortPayantMontant()
    {
        return $this->foPortPayantMontant;
    }

    /**
     * Set foPortPayantTexte
     *
     * @param string $foPortPayantTexte
     *
     * @return Fournisseurs
     */
    public function setFoPortPayantTexte($foPortPayantTexte)
    {
        $this->foPortPayantTexte = $foPortPayantTexte;

        return $this;
    }

    /**
     * Get foPortPayantTexte
     *
     * @return string
     */
    public function getFoPortPayantTexte()
    {
        return $this->foPortPayantTexte;
    }

    /**
     * Set foPortOffertQte
     *
     * @param integer $foPortOffertQte
     *
     * @return Fournisseurs
     */
    public function setFoPortOffertQte($foPortOffertQte)
    {
        $this->foPortOffertQte = $foPortOffertQte;

        return $this;
    }

    /**
     * Get foPortOffertQte
     *
     * @return integer
     */
    public function getFoPortOffertQte()
    {
        return $this->foPortOffertQte;
    }

    /**
     * Set foPortOffertMontant
     *
     * @param float $foPortOffertMontant
     *
     * @return Fournisseurs
     */
    public function setFoPortOffertMontant($foPortOffertMontant)
    {
        $this->foPortOffertMontant = $foPortOffertMontant;

        return $this;
    }

    /**
     * Get foPortOffertMontant
     *
     * @return float
     */
    public function getFoPortOffertMontant()
    {
        return $this->foPortOffertMontant;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Fournisseurs
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
     * @return Fournisseurs
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
     * @return Fournisseurs
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
     * @return Fournisseurs
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
