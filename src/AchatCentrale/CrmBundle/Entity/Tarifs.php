<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarifs
 *
 * @ORM\Table(name="TARIFS")
 * @ORM\Entity
 */
class Tarifs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="TA_EFFECTIF", type="string", length=50, nullable=true)
     */
    private $taEffectif;

    /**
     * @var integer
     *
     * @ORM\Column(name="TA_UNITE", type="integer", nullable=true)
     */
    private $taUnite;

    /**
     * @var float
     *
     * @ORM\Column(name="TA_PRIX", type="float", precision=53, scale=0, nullable=true)
     */
    private $taPrix;

    /**
     * @var float
     *
     * @ORM\Column(name="TA_PRIX_REMISE", type="float", precision=53, scale=0, nullable=true)
     */
    private $taPrixRemise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TA_DATE", type="datetime", nullable=true)
     */
    private $taDate;



    /**
     * Get taId
     *
     * @return integer
     */
    public function getTaId()
    {
        return $this->taId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Tarifs
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
     * Set taEffectif
     *
     * @param string $taEffectif
     *
     * @return Tarifs
     */
    public function setTaEffectif($taEffectif)
    {
        $this->taEffectif = $taEffectif;

        return $this;
    }

    /**
     * Get taEffectif
     *
     * @return string
     */
    public function getTaEffectif()
    {
        return $this->taEffectif;
    }

    /**
     * Set taUnite
     *
     * @param integer $taUnite
     *
     * @return Tarifs
     */
    public function setTaUnite($taUnite)
    {
        $this->taUnite = $taUnite;

        return $this;
    }

    /**
     * Get taUnite
     *
     * @return integer
     */
    public function getTaUnite()
    {
        return $this->taUnite;
    }

    /**
     * Set taPrix
     *
     * @param float $taPrix
     *
     * @return Tarifs
     */
    public function setTaPrix($taPrix)
    {
        $this->taPrix = $taPrix;

        return $this;
    }

    /**
     * Get taPrix
     *
     * @return float
     */
    public function getTaPrix()
    {
        return $this->taPrix;
    }

    /**
     * Set taPrixRemise
     *
     * @param float $taPrixRemise
     *
     * @return Tarifs
     */
    public function setTaPrixRemise($taPrixRemise)
    {
        $this->taPrixRemise = $taPrixRemise;

        return $this;
    }

    /**
     * Get taPrixRemise
     *
     * @return float
     */
    public function getTaPrixRemise()
    {
        return $this->taPrixRemise;
    }

    /**
     * Set taDate
     *
     * @param \DateTime $taDate
     *
     * @return Tarifs
     */
    public function setTaDate($taDate)
    {
        $this->taDate = $taDate;

        return $this;
    }

    /**
     * Get taDate
     *
     * @return \DateTime
     */
    public function getTaDate()
    {
        return $this->taDate;
    }
}
