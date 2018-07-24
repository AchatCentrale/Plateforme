<?php

namespace RocEclercBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CodesPromo
 *
 * @ORM\Table(name="CODES_PROMO")
 * @ORM\Entity
 */
class CodesPromo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cpId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="CP_CODE", type="string", length=50, nullable=true)
     */
    private $cpCode;

    /**
     * @var float
     *
     * @ORM\Column(name="CP_REMISE", type="float", precision=53, scale=0, nullable=true)
     */
    private $cpRemise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CP_VALIDITE", type="datetime", nullable=true)
     */
    private $cpValidite;

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
     * Get cpId
     *
     * @return integer
     */
    public function getCpId()
    {
        return $this->cpId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return CodesPromo
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
     * Set cpCode
     *
     * @param string $cpCode
     *
     * @return CodesPromo
     */
    public function setCpCode($cpCode)
    {
        $this->cpCode = $cpCode;

        return $this;
    }

    /**
     * Get cpCode
     *
     * @return string
     */
    public function getCpCode()
    {
        return $this->cpCode;
    }

    /**
     * Set cpRemise
     *
     * @param float $cpRemise
     *
     * @return CodesPromo
     */
    public function setCpRemise($cpRemise)
    {
        $this->cpRemise = $cpRemise;

        return $this;
    }

    /**
     * Get cpRemise
     *
     * @return float
     */
    public function getCpRemise()
    {
        return $this->cpRemise;
    }

    /**
     * Set cpValidite
     *
     * @param \DateTime $cpValidite
     *
     * @return CodesPromo
     */
    public function setCpValidite($cpValidite)
    {
        $this->cpValidite = $cpValidite;

        return $this;
    }

    /**
     * Get cpValidite
     *
     * @return \DateTime
     */
    public function getCpValidite()
    {
        return $this->cpValidite;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return CodesPromo
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
     * @return CodesPromo
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
     * @return CodesPromo
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
     * @return CodesPromo
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
