<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournPlus
 *
 * @ORM\Table(name="FOURN_PLUS")
 * @ORM\Entity
 */
class FournPlus
{
    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF_TITRE1", type="string", length=100, nullable=true)
     */
    private $fpPdfTitre1;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF1", type="string", length=100, nullable=true)
     */
    private $fpPdf1;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF_TITRE2", type="string", length=100, nullable=true)
     */
    private $fpPdfTitre2;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF2", type="string", length=100, nullable=true)
     */
    private $fpPdf2;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PLUS", type="string", length=2000, nullable=true)
     */
    private $fpPlus;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_CONSEILS", type="string", length=2000, nullable=true)
     */
    private $fpConseils;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_TEMPO", type="string", length=50, nullable=true)
     */
    private $fpTempo;

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
     * @var \SiteBundle\Entity\Fournisseurs
     *
     * @ORM\OneToOne(targetEntity="SiteBundle\Entity\Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FO_ID", referencedColumnName="FO_ID", unique=true)
     * })
     */
    private $fo;



    /**
     * Set fpPdfTitre1
     *
     * @param string $fpPdfTitre1
     *
     * @return FournPlus
     */
    public function setFpPdfTitre1($fpPdfTitre1)
    {
        $this->fpPdfTitre1 = $fpPdfTitre1;

        return $this;
    }

    /**
     * Get fpPdfTitre1
     *
     * @return string
     */
    public function getFpPdfTitre1()
    {
        return $this->fpPdfTitre1;
    }

    /**
     * Set fpPdf1
     *
     * @param string $fpPdf1
     *
     * @return FournPlus
     */
    public function setFpPdf1($fpPdf1)
    {
        $this->fpPdf1 = $fpPdf1;

        return $this;
    }

    /**
     * Get fpPdf1
     *
     * @return string
     */
    public function getFpPdf1()
    {
        return $this->fpPdf1;
    }

    /**
     * Set fpPdfTitre2
     *
     * @param string $fpPdfTitre2
     *
     * @return FournPlus
     */
    public function setFpPdfTitre2($fpPdfTitre2)
    {
        $this->fpPdfTitre2 = $fpPdfTitre2;

        return $this;
    }

    /**
     * Get fpPdfTitre2
     *
     * @return string
     */
    public function getFpPdfTitre2()
    {
        return $this->fpPdfTitre2;
    }

    /**
     * Set fpPdf2
     *
     * @param string $fpPdf2
     *
     * @return FournPlus
     */
    public function setFpPdf2($fpPdf2)
    {
        $this->fpPdf2 = $fpPdf2;

        return $this;
    }

    /**
     * Get fpPdf2
     *
     * @return string
     */
    public function getFpPdf2()
    {
        return $this->fpPdf2;
    }

    /**
     * Set fpPlus
     *
     * @param string $fpPlus
     *
     * @return FournPlus
     */
    public function setFpPlus($fpPlus)
    {
        $this->fpPlus = $fpPlus;

        return $this;
    }

    /**
     * Get fpPlus
     *
     * @return string
     */
    public function getFpPlus()
    {
        return $this->fpPlus;
    }

    /**
     * Set fpConseils
     *
     * @param string $fpConseils
     *
     * @return FournPlus
     */
    public function setFpConseils($fpConseils)
    {
        $this->fpConseils = $fpConseils;

        return $this;
    }

    /**
     * Get fpConseils
     *
     * @return string
     */
    public function getFpConseils()
    {
        return $this->fpConseils;
    }

    /**
     * Set fpTempo
     *
     * @param string $fpTempo
     *
     * @return FournPlus
     */
    public function setFpTempo($fpTempo)
    {
        $this->fpTempo = $fpTempo;

        return $this;
    }

    /**
     * Get fpTempo
     *
     * @return string
     */
    public function getFpTempo()
    {
        return $this->fpTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return FournPlus
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
     * @return FournPlus
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
     * @return FournPlus
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
     * @return FournPlus
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
     * Set fo
     *
     * @param \SiteBundle\Entity\Fournisseurs $fo
     *
     * @return FournPlus
     */
    public function setFo(\SiteBundle\Entity\Fournisseurs $fo = null)
    {
        $this->fo = $fo;

        return $this;
    }

    /**
     * Get fo
     *
     * @return \SiteBundle\Entity\Fournisseurs
     */
    public function getFo()
    {
        return $this->fo;
    }
}
