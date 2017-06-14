<?php

namespace FunecapBundle\Entity;

/**
 * ClientsAdresses
 */
class ClientsAdresses
{
    /**
     * @var integer
     */
    private $caId;

    /**
     * @var integer
     */
    private $clId;

    /**
     * @var string
     */
    private $caType;

    /**
     * @var string
     */
    private $caRaisonsoc;

    /**
     * @var string
     */
    private $caAdresse1;

    /**
     * @var string
     */
    private $caAdresse2;

    /**
     * @var string
     */
    private $caCp;

    /**
     * @var string
     */
    private $caVille;

    /**
     * @var string
     */
    private $caPays;

    /**
     * @var integer
     */
    private $caPrincipale;

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
     * Get caId
     *
     * @return integer
     */
    public function getCaId()
    {
        return $this->caId;
    }

    /**
     * Set clId
     *
     * @param integer $clId
     *
     * @return ClientsAdresses
     */
    public function setClId($clId)
    {
        $this->clId = $clId;

        return $this;
    }

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
     * Set caType
     *
     * @param string $caType
     *
     * @return ClientsAdresses
     */
    public function setCaType($caType)
    {
        $this->caType = $caType;

        return $this;
    }

    /**
     * Get caType
     *
     * @return string
     */
    public function getCaType()
    {
        return $this->caType;
    }

    /**
     * Set caRaisonsoc
     *
     * @param string $caRaisonsoc
     *
     * @return ClientsAdresses
     */
    public function setCaRaisonsoc($caRaisonsoc)
    {
        $this->caRaisonsoc = $caRaisonsoc;

        return $this;
    }

    /**
     * Get caRaisonsoc
     *
     * @return string
     */
    public function getCaRaisonsoc()
    {
        return $this->caRaisonsoc;
    }

    /**
     * Set caAdresse1
     *
     * @param string $caAdresse1
     *
     * @return ClientsAdresses
     */
    public function setCaAdresse1($caAdresse1)
    {
        $this->caAdresse1 = $caAdresse1;

        return $this;
    }

    /**
     * Get caAdresse1
     *
     * @return string
     */
    public function getCaAdresse1()
    {
        return $this->caAdresse1;
    }

    /**
     * Set caAdresse2
     *
     * @param string $caAdresse2
     *
     * @return ClientsAdresses
     */
    public function setCaAdresse2($caAdresse2)
    {
        $this->caAdresse2 = $caAdresse2;

        return $this;
    }

    /**
     * Get caAdresse2
     *
     * @return string
     */
    public function getCaAdresse2()
    {
        return $this->caAdresse2;
    }

    /**
     * Set caCp
     *
     * @param string $caCp
     *
     * @return ClientsAdresses
     */
    public function setCaCp($caCp)
    {
        $this->caCp = $caCp;

        return $this;
    }

    /**
     * Get caCp
     *
     * @return string
     */
    public function getCaCp()
    {
        return $this->caCp;
    }

    /**
     * Set caVille
     *
     * @param string $caVille
     *
     * @return ClientsAdresses
     */
    public function setCaVille($caVille)
    {
        $this->caVille = $caVille;

        return $this;
    }

    /**
     * Get caVille
     *
     * @return string
     */
    public function getCaVille()
    {
        return $this->caVille;
    }

    /**
     * Set caPays
     *
     * @param string $caPays
     *
     * @return ClientsAdresses
     */
    public function setCaPays($caPays)
    {
        $this->caPays = $caPays;

        return $this;
    }

    /**
     * Get caPays
     *
     * @return string
     */
    public function getCaPays()
    {
        return $this->caPays;
    }

    /**
     * Set caPrincipale
     *
     * @param integer $caPrincipale
     *
     * @return ClientsAdresses
     */
    public function setCaPrincipale($caPrincipale)
    {
        $this->caPrincipale = $caPrincipale;

        return $this;
    }

    /**
     * Get caPrincipale
     *
     * @return integer
     */
    public function getCaPrincipale()
    {
        return $this->caPrincipale;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ClientsAdresses
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
     * @return ClientsAdresses
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
     * @return ClientsAdresses
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
     * @return ClientsAdresses
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

