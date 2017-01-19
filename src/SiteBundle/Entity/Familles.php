<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familles
 *
 * @ORM\Table(name="FAMILLES", indexes={@ORM\Index(name="IDX_59A7616B90B34CA6", columns={"RA_ID"})})
 * @ORM\Entity
 */
class Familles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $faId;

    /**
     * @var string
     *
     * @ORM\Column(name="FA_NOM", type="string", length=100, nullable=true)
     */
    private $faNom;

    /**
     * @var string
     *
     * @ORM\Column(name="FA_DESCR", type="text", length=16, nullable=true)
     */
    private $faDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="FA_TRI", type="integer", nullable=true)
     */
    private $faTri = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="FA_TEMPO", type="string", length=50, nullable=true)
     */
    private $faTempo;

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
     * @var \SiteBundle\Entity\Rayons
     *
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Rayons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RA_ID", referencedColumnName="RA_ID")
     * })
     */
    private $ra;



    /**
     * Get faId
     *
     * @return integer
     */
    public function getFaId()
    {
        return $this->faId;
    }

    /**
     * Set faNom
     *
     * @param string $faNom
     *
     * @return Familles
     */
    public function setFaNom($faNom)
    {
        $this->faNom = $faNom;

        return $this;
    }

    /**
     * Get faNom
     *
     * @return string
     */
    public function getFaNom()
    {
        return $this->faNom;
    }

    /**
     * Set faDescr
     *
     * @param string $faDescr
     *
     * @return Familles
     */
    public function setFaDescr($faDescr)
    {
        $this->faDescr = $faDescr;

        return $this;
    }

    /**
     * Get faDescr
     *
     * @return string
     */
    public function getFaDescr()
    {
        return $this->faDescr;
    }

    /**
     * Set faTri
     *
     * @param integer $faTri
     *
     * @return Familles
     */
    public function setFaTri($faTri)
    {
        $this->faTri = $faTri;

        return $this;
    }

    /**
     * Get faTri
     *
     * @return integer
     */
    public function getFaTri()
    {
        return $this->faTri;
    }

    /**
     * Set faTempo
     *
     * @param string $faTempo
     *
     * @return Familles
     */
    public function setFaTempo($faTempo)
    {
        $this->faTempo = $faTempo;

        return $this;
    }

    /**
     * Get faTempo
     *
     * @return string
     */
    public function getFaTempo()
    {
        return $this->faTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Familles
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
     * @return Familles
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
     * @return Familles
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
     * @return Familles
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
     * Set ra
     *
     * @param \SiteBundle\Entity\Rayons $ra
     *
     * @return Familles
     */
    public function setRa(\SiteBundle\Entity\Rayons $ra = null)
    {
        $this->ra = $ra;

        return $this;
    }

    /**
     * Get ra
     *
     * @return \SiteBundle\Entity\Rayons
     */
    public function getRa()
    {
        return $this->ra;
    }
}
