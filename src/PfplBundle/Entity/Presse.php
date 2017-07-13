<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presse
 *
 * @ORM\Table(name="PRESSE")
 * @ORM\Entity
 */
class Presse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_TITRE", type="string", length=100, nullable=true)
     */
    private $ppTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_LOGO", type="string", length=100, nullable=true)
     */
    private $ppLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_IMAGE", type="string", length=100, nullable=true)
     */
    private $ppImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PP_DATE", type="datetime", nullable=true)
     */
    private $ppDate;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_PAGE", type="string", length=50, nullable=true)
     */
    private $ppPage;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_DESCR", type="text", length=16, nullable=true)
     */
    private $ppDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ORDRE", type="integer", nullable=true)
     */
    private $ppOrdre;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_TEMPO", type="string", length=50, nullable=true)
     */
    private $ppTempo;

    /**
     * @var integer
     *
     * @ORM\Column(name="PP_STATUS", type="integer", nullable=true)
     */
    private $ppStatus;

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
