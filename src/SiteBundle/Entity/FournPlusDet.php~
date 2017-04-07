<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournPlusDet
 *
 * @ORM\Table(name="FOURN_PLUS_DET", indexes={@ORM\Index(name="IDX_AB27A582E50C0AD7", columns={"FO_ID"})})
 * @ORM\Entity
 */
class FournPlusDet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FD_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fdId;

    /**
     * @var string
     *
     * @ORM\Column(name="FD_TYPE", type="string", length=5, nullable=true)
     */
    private $fdType;

    /**
     * @var string
     *
     * @ORM\Column(name="FD_TEXTE", type="text", length=16, nullable=true)
     */
    private $fdTexte;

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
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FO_ID", referencedColumnName="FO_ID")
     * })
     */
    private $fo;



    /**
     * Get fdId
     *
     * @return integer
     */
    public function getFdId()
    {
        return $this->fdId;
    }

    /**
     * Set fdType
     *
     * @param string $fdType
     *
     * @return FournPlusDet
     */
    public function setFdType($fdType)
    {
        $this->fdType = $fdType;

        return $this;
    }

    /**
     * Get fdType
     *
     * @return string
     */
    public function getFdType()
    {
        return $this->fdType;
    }

    /**
     * Set fdTexte
     *
     * @param string $fdTexte
     *
     * @return FournPlusDet
     */
    public function setFdTexte($fdTexte)
    {
        $this->fdTexte = $fdTexte;

        return $this;
    }

    /**
     * Get fdTexte
     *
     * @return string
     */
    public function getFdTexte()
    {
        return $this->fdTexte;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * @return FournPlusDet
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
