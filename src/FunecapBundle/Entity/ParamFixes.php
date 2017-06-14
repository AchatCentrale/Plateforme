<?php

namespace FunecapBundle\Entity;

/**
 * ParamFixes
 */
class ParamFixes
{
    /**
     * @var integer
     */
    private $pfId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $pfSmtp;

    /**
     * @var string
     */
    private $pfSmtpUser;

    /**
     * @var string
     */
    private $pfSmtpPass;

    /**
     * @var integer
     */
    private $pfPays;

    /**
     * @var string
     */
    private $pfPaysDescr;

    /**
     * @var string
     */
    private $pfSiteUrl;

    /**
     * @var integer
     */
    private $pfAccueil;

    /**
     * @var integer
     */
    private $pfAdherer;

    /**
     * @var integer
     */
    private $pfContact;

    /**
     * @var integer
     */
    private $pfDecouvrir;

    /**
     * @var integer
     */
    private $pfRecherche;

    /**
     * @var integer
     */
    private $pfConnecter;

    /**
     * @var integer
     */
    private $pfEspacePrive;

    /**
     * @var integer
     */
    private $pfEspacePriveF;

    /**
     * @var integer
     */
    private $pfInfosUtiles;

    /**
     * @var integer
     */
    private $pfTickets;

    /**
     * @var string
     */
    private $pfPlusPart;

    /**
     * @var string
     */
    private $pfPlusConseil;

    /**
     * @var integer
     */
    private $pfPrixAffiche;

    /**
     * @var integer
     */
    private $pfRegion;

    /**
     * @var string
     */
    private $pfMessAccueil;

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
     * Get pfId
     *
     * @return integer
     */
    public function getPfId()
    {
        return $this->pfId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return ParamFixes
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
     * Set pfSmtp
     *
     * @param string $pfSmtp
     *
     * @return ParamFixes
     */
    public function setPfSmtp($pfSmtp)
    {
        $this->pfSmtp = $pfSmtp;

        return $this;
    }

    /**
     * Get pfSmtp
     *
     * @return string
     */
    public function getPfSmtp()
    {
        return $this->pfSmtp;
    }

    /**
     * Set pfSmtpUser
     *
     * @param string $pfSmtpUser
     *
     * @return ParamFixes
     */
    public function setPfSmtpUser($pfSmtpUser)
    {
        $this->pfSmtpUser = $pfSmtpUser;

        return $this;
    }

    /**
     * Get pfSmtpUser
     *
     * @return string
     */
    public function getPfSmtpUser()
    {
        return $this->pfSmtpUser;
    }

    /**
     * Set pfSmtpPass
     *
     * @param string $pfSmtpPass
     *
     * @return ParamFixes
     */
    public function setPfSmtpPass($pfSmtpPass)
    {
        $this->pfSmtpPass = $pfSmtpPass;

        return $this;
    }

    /**
     * Get pfSmtpPass
     *
     * @return string
     */
    public function getPfSmtpPass()
    {
        return $this->pfSmtpPass;
    }

    /**
     * Set pfPays
     *
     * @param integer $pfPays
     *
     * @return ParamFixes
     */
    public function setPfPays($pfPays)
    {
        $this->pfPays = $pfPays;

        return $this;
    }

    /**
     * Get pfPays
     *
     * @return integer
     */
    public function getPfPays()
    {
        return $this->pfPays;
    }

    /**
     * Set pfPaysDescr
     *
     * @param string $pfPaysDescr
     *
     * @return ParamFixes
     */
    public function setPfPaysDescr($pfPaysDescr)
    {
        $this->pfPaysDescr = $pfPaysDescr;

        return $this;
    }

    /**
     * Get pfPaysDescr
     *
     * @return string
     */
    public function getPfPaysDescr()
    {
        return $this->pfPaysDescr;
    }

    /**
     * Set pfSiteUrl
     *
     * @param string $pfSiteUrl
     *
     * @return ParamFixes
     */
    public function setPfSiteUrl($pfSiteUrl)
    {
        $this->pfSiteUrl = $pfSiteUrl;

        return $this;
    }

    /**
     * Get pfSiteUrl
     *
     * @return string
     */
    public function getPfSiteUrl()
    {
        return $this->pfSiteUrl;
    }

    /**
     * Set pfAccueil
     *
     * @param integer $pfAccueil
     *
     * @return ParamFixes
     */
    public function setPfAccueil($pfAccueil)
    {
        $this->pfAccueil = $pfAccueil;

        return $this;
    }

    /**
     * Get pfAccueil
     *
     * @return integer
     */
    public function getPfAccueil()
    {
        return $this->pfAccueil;
    }

    /**
     * Set pfAdherer
     *
     * @param integer $pfAdherer
     *
     * @return ParamFixes
     */
    public function setPfAdherer($pfAdherer)
    {
        $this->pfAdherer = $pfAdherer;

        return $this;
    }

    /**
     * Get pfAdherer
     *
     * @return integer
     */
    public function getPfAdherer()
    {
        return $this->pfAdherer;
    }

    /**
     * Set pfContact
     *
     * @param integer $pfContact
     *
     * @return ParamFixes
     */
    public function setPfContact($pfContact)
    {
        $this->pfContact = $pfContact;

        return $this;
    }

    /**
     * Get pfContact
     *
     * @return integer
     */
    public function getPfContact()
    {
        return $this->pfContact;
    }

    /**
     * Set pfDecouvrir
     *
     * @param integer $pfDecouvrir
     *
     * @return ParamFixes
     */
    public function setPfDecouvrir($pfDecouvrir)
    {
        $this->pfDecouvrir = $pfDecouvrir;

        return $this;
    }

    /**
     * Get pfDecouvrir
     *
     * @return integer
     */
    public function getPfDecouvrir()
    {
        return $this->pfDecouvrir;
    }

    /**
     * Set pfRecherche
     *
     * @param integer $pfRecherche
     *
     * @return ParamFixes
     */
    public function setPfRecherche($pfRecherche)
    {
        $this->pfRecherche = $pfRecherche;

        return $this;
    }

    /**
     * Get pfRecherche
     *
     * @return integer
     */
    public function getPfRecherche()
    {
        return $this->pfRecherche;
    }

    /**
     * Set pfConnecter
     *
     * @param integer $pfConnecter
     *
     * @return ParamFixes
     */
    public function setPfConnecter($pfConnecter)
    {
        $this->pfConnecter = $pfConnecter;

        return $this;
    }

    /**
     * Get pfConnecter
     *
     * @return integer
     */
    public function getPfConnecter()
    {
        return $this->pfConnecter;
    }

    /**
     * Set pfEspacePrive
     *
     * @param integer $pfEspacePrive
     *
     * @return ParamFixes
     */
    public function setPfEspacePrive($pfEspacePrive)
    {
        $this->pfEspacePrive = $pfEspacePrive;

        return $this;
    }

    /**
     * Get pfEspacePrive
     *
     * @return integer
     */
    public function getPfEspacePrive()
    {
        return $this->pfEspacePrive;
    }

    /**
     * Set pfEspacePriveF
     *
     * @param integer $pfEspacePriveF
     *
     * @return ParamFixes
     */
    public function setPfEspacePriveF($pfEspacePriveF)
    {
        $this->pfEspacePriveF = $pfEspacePriveF;

        return $this;
    }

    /**
     * Get pfEspacePriveF
     *
     * @return integer
     */
    public function getPfEspacePriveF()
    {
        return $this->pfEspacePriveF;
    }

    /**
     * Set pfInfosUtiles
     *
     * @param integer $pfInfosUtiles
     *
     * @return ParamFixes
     */
    public function setPfInfosUtiles($pfInfosUtiles)
    {
        $this->pfInfosUtiles = $pfInfosUtiles;

        return $this;
    }

    /**
     * Get pfInfosUtiles
     *
     * @return integer
     */
    public function getPfInfosUtiles()
    {
        return $this->pfInfosUtiles;
    }

    /**
     * Set pfTickets
     *
     * @param integer $pfTickets
     *
     * @return ParamFixes
     */
    public function setPfTickets($pfTickets)
    {
        $this->pfTickets = $pfTickets;

        return $this;
    }

    /**
     * Get pfTickets
     *
     * @return integer
     */
    public function getPfTickets()
    {
        return $this->pfTickets;
    }

    /**
     * Set pfPlusPart
     *
     * @param string $pfPlusPart
     *
     * @return ParamFixes
     */
    public function setPfPlusPart($pfPlusPart)
    {
        $this->pfPlusPart = $pfPlusPart;

        return $this;
    }

    /**
     * Get pfPlusPart
     *
     * @return string
     */
    public function getPfPlusPart()
    {
        return $this->pfPlusPart;
    }

    /**
     * Set pfPlusConseil
     *
     * @param string $pfPlusConseil
     *
     * @return ParamFixes
     */
    public function setPfPlusConseil($pfPlusConseil)
    {
        $this->pfPlusConseil = $pfPlusConseil;

        return $this;
    }

    /**
     * Get pfPlusConseil
     *
     * @return string
     */
    public function getPfPlusConseil()
    {
        return $this->pfPlusConseil;
    }

    /**
     * Set pfPrixAffiche
     *
     * @param integer $pfPrixAffiche
     *
     * @return ParamFixes
     */
    public function setPfPrixAffiche($pfPrixAffiche)
    {
        $this->pfPrixAffiche = $pfPrixAffiche;

        return $this;
    }

    /**
     * Get pfPrixAffiche
     *
     * @return integer
     */
    public function getPfPrixAffiche()
    {
        return $this->pfPrixAffiche;
    }

    /**
     * Set pfRegion
     *
     * @param integer $pfRegion
     *
     * @return ParamFixes
     */
    public function setPfRegion($pfRegion)
    {
        $this->pfRegion = $pfRegion;

        return $this;
    }

    /**
     * Get pfRegion
     *
     * @return integer
     */
    public function getPfRegion()
    {
        return $this->pfRegion;
    }

    /**
     * Set pfMessAccueil
     *
     * @param string $pfMessAccueil
     *
     * @return ParamFixes
     */
    public function setPfMessAccueil($pfMessAccueil)
    {
        $this->pfMessAccueil = $pfMessAccueil;

        return $this;
    }

    /**
     * Get pfMessAccueil
     *
     * @return string
     */
    public function getPfMessAccueil()
    {
        return $this->pfMessAccueil;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ParamFixes
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
     * @return ParamFixes
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
     * @return ParamFixes
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
     * @return ParamFixes
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

