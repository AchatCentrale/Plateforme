<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rayons
 *
 * @ORM\Table(name="RAYONS")
 * @ORM\Entity
 */
class Rayons
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $raId;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_NOM", type="string", length=100, nullable=true)
     */
    private $raNom;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_DESCR", type="text", length=16, nullable=true)
     */
    private $raDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_PICTO", type="string", length=50, nullable=true)
     */
    private $raPicto;

    /**
     * @var integer
     *
     * @ORM\Column(name="RA_TRI", type="integer", nullable=true)
     */
    private $raTri = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="RA_TEMPO", type="string", length=50, nullable=true)
     */
    private $raTempo;

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
     * Get raId
     *
     * @return integer
     */
    public function getRaId()
    {
        return $this->raId;
    }

    /**
     * Set raNom
     *
     * @param string $raNom
     *
     * @return Rayons
     */
    public function setRaNom($raNom)
    {
        $this->raNom = $raNom;

        return $this;
    }

    /**
     * Get raNom
     *
     * @return string
     */
    public function getRaNom()
    {
        return $this->raNom;
    }

    /**
     * Set raDescr
     *
     * @param string $raDescr
     *
     * @return Rayons
     */
    public function setRaDescr($raDescr)
    {
        $this->raDescr = $raDescr;

        return $this;
    }

    /**
     * Get raDescr
     *
     * @return string
     */
    public function getRaDescr()
    {
        return $this->raDescr;
    }

    /**
     * Set raPicto
     *
     * @param string $raPicto
     *
     * @return Rayons
     */
    public function setRaPicto($raPicto)
    {
        $this->raPicto = $raPicto;

        return $this;
    }

    /**
     * Get raPicto
     *
     * @return string
     */
    public function getRaPicto()
    {
        return $this->raPicto;
    }

    /**
     * Set raTri
     *
     * @param integer $raTri
     *
     * @return Rayons
     */
    public function setRaTri($raTri)
    {
        $this->raTri = $raTri;

        return $this;
    }

    /**
     * Get raTri
     *
     * @return integer
     */
    public function getRaTri()
    {
        return $this->raTri;
    }

    /**
     * Set raTempo
     *
     * @param string $raTempo
     *
     * @return Rayons
     */
    public function setRaTempo($raTempo)
    {
        $this->raTempo = $raTempo;

        return $this;
    }

    /**
     * Get raTempo
     *
     * @return string
     */
    public function getRaTempo()
    {
        return $this->raTempo;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Rayons
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
     * @return Rayons
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
     * @return Rayons
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
     * @return Rayons
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
