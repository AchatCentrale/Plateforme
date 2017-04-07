<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filtres
 *
 * @ORM\Table(name="FILTRES")
 * @ORM\Entity
 */
class Filtres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FI_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="FI_CODE", type="string", length=100, nullable=true)
     */
    private $fiCode;

    /**
     * @var string
     *
     * @ORM\Column(name="FI_VALEUR", type="string", length=100, nullable=true)
     */
    private $fiValeur;

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
     * Get fiId
     *
     * @return integer
     */
    public function getFiId()
    {
        return $this->fiId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Filtres
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
     * Set fiCode
     *
     * @param string $fiCode
     *
     * @return Filtres
     */
    public function setFiCode($fiCode)
    {
        $this->fiCode = $fiCode;

        return $this;
    }

    /**
     * Get fiCode
     *
     * @return string
     */
    public function getFiCode()
    {
        return $this->fiCode;
    }

    /**
     * Set fiValeur
     *
     * @param string $fiValeur
     *
     * @return Filtres
     */
    public function setFiValeur($fiValeur)
    {
        $this->fiValeur = $fiValeur;

        return $this;
    }

    /**
     * Get fiValeur
     *
     * @return string
     */
    public function getFiValeur()
    {
        return $this->fiValeur;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Filtres
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
     * @return Filtres
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
     * @return Filtres
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
     * @return Filtres
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
