<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SocietesUsers
 *
 * @ORM\Table(name="SOCIETES_USERS")
 * @ORM\Entity
 */
class SocietesUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SU_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $suId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="US_ID", type="integer", nullable=true)
     */
    private $usId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SU_NIVEAU", type="integer", nullable=true)
     */
    private $suNiveau;

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
     * Get suId
     *
     * @return integer
     */
    public function getSuId()
    {
        return $this->suId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return SocietesUsers
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
     * Set usId
     *
     * @param integer $usId
     *
     * @return SocietesUsers
     */
    public function setUsId($usId)
    {
        $this->usId = $usId;

        return $this;
    }

    /**
     * Get usId
     *
     * @return integer
     */
    public function getUsId()
    {
        return $this->usId;
    }

    /**
     * Set suNiveau
     *
     * @param integer $suNiveau
     *
     * @return SocietesUsers
     */
    public function setSuNiveau($suNiveau)
    {
        $this->suNiveau = $suNiveau;

        return $this;
    }

    /**
     * Get suNiveau
     *
     * @return integer
     */
    public function getSuNiveau()
    {
        return $this->suNiveau;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return SocietesUsers
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
     * @return SocietesUsers
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
     * @return SocietesUsers
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
     * @return SocietesUsers
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
