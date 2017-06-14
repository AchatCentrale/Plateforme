<?php

namespace FunecapBundle\Entity;

/**
 * Presse
 */
class Presse
{
    /**
     * @var integer
     */
    private $ppId;

    /**
     * @var integer
     */
    private $soId;

    /**
     * @var string
     */
    private $ppTitre;

    /**
     * @var string
     */
    private $ppLogo;

    /**
     * @var string
     */
    private $ppImage;

    /**
     * @var \DateTime
     */
    private $ppDate;

    /**
     * @var string
     */
    private $ppPage;

    /**
     * @var string
     */
    private $ppDescr;

    /**
     * @var integer
     */
    private $ppOrdre;

    /**
     * @var string
     */
    private $ppTempo;

    /**
     * @var integer
     */
    private $ppStatus;

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
     * Get ppId
     *
     * @return integer
     */
    public function getPpId()
    {
        return $this->ppId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Presse
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
     * Set ppTitre
     *
     * @param string $ppTitre
     *
     * @return Presse
     */
    public function setPpTitre($ppTitre)
    {
        $this->ppTitre = $ppTitre;

        return $this;
    }

    /**
     * Get ppTitre
     *
     * @return string
     */
    public function getPpTitre()
    {
        return $this->ppTitre;
    }

    /**
     * Set ppLogo
     *
     * @param string $ppLogo
     *
     * @return Presse
     */
    public function setPpLogo($ppLogo)
    {
        $this->ppLogo = $ppLogo;

        return $this;
    }

    /**
     * Get ppLogo
     *
     * @return string
     */
    public function getPpLogo()
    {
        return $this->ppLogo;
    }

    /**
     * Set ppImage
     *
     * @param string $ppImage
     *
     * @return Presse
     */
    public function setPpImage($ppImage)
    {
        $this->ppImage = $ppImage;

        return $this;
    }

    /**
     * Get ppImage
     *
     * @return string
     */
    public function getPpImage()
    {
        return $this->ppImage;
    }

    /**
     * Set ppDate
     *
     * @param \DateTime $ppDate
     *
     * @return Presse
     */
    public function setPpDate($ppDate)
    {
        $this->ppDate = $ppDate;

        return $this;
    }

    /**
     * Get ppDate
     *
     * @return \DateTime
     */
    public function getPpDate()
    {
        return $this->ppDate;
    }

    /**
     * Set ppPage
     *
     * @param string $ppPage
     *
     * @return Presse
     */
    public function setPpPage($ppPage)
    {
        $this->ppPage = $ppPage;

        return $this;
    }

    /**
     * Get ppPage
     *
     * @return string
     */
    public function getPpPage()
    {
        return $this->ppPage;
    }

    /**
     * Set ppDescr
     *
     * @param string $ppDescr
     *
     * @return Presse
     */
    public function setPpDescr($ppDescr)
    {
        $this->ppDescr = $ppDescr;

        return $this;
    }

    /**
     * Get ppDescr
     *
     * @return string
     */
    public function getPpDescr()
    {
        return $this->ppDescr;
    }

    /**
     * Set ppOrdre
     *
     * @param integer $ppOrdre
     *
     * @return Presse
     */
    public function setPpOrdre($ppOrdre)
    {
        $this->ppOrdre = $ppOrdre;

        return $this;
    }

    /**
     * Get ppOrdre
     *
     * @return integer
     */
    public function getPpOrdre()
    {
        return $this->ppOrdre;
    }

    /**
     * Set ppTempo
     *
     * @param string $ppTempo
     *
     * @return Presse
     */
    public function setPpTempo($ppTempo)
    {
        $this->ppTempo = $ppTempo;

        return $this;
    }

    /**
     * Get ppTempo
     *
     * @return string
     */
    public function getPpTempo()
    {
        return $this->ppTempo;
    }

    /**
     * Set ppStatus
     *
     * @param integer $ppStatus
     *
     * @return Presse
     */
    public function setPpStatus($ppStatus)
    {
        $this->ppStatus = $ppStatus;

        return $this;
    }

    /**
     * Get ppStatus
     *
     * @return integer
     */
    public function getPpStatus()
    {
        return $this->ppStatus;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Presse
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
     * @return Presse
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
     * @return Presse
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
     * @return Presse
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

