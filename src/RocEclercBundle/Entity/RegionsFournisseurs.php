<?php

namespace RocEclercBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegionsFournisseurs
 *
 * @ORM\Table(name="REGIONS_FOURNISSEURS")
 * @ORM\Entity
 */
class RegionsFournisseurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RE_ID", type="integer", nullable=false)
     */
    private $reId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=false)
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_ID", type="integer", nullable=true)
     */
    private $fcId;

    /**
     * @var integer
     *
     * @ORM\Column(name="US_ID", type="integer", nullable=true)
     */
    private $usId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="INS_DATE", type="date", nullable=true)
     */
    private $insDate;

    /**
     * @var string
     *
     * @ORM\Column(name="INS_USER", type="string", length=100, nullable=true)
     */
    private $insUser;



    /**
     * Get rfId
     *
     * @return integer
     */
    public function getRfId()
    {
        return $this->rfId;
    }

    /**
     * Set reId
     *
     * @param integer $reId
     *
     * @return RegionsFournisseurs
     */
    public function setReId($reId)
    {
        $this->reId = $reId;

        return $this;
    }

    /**
     * Get reId
     *
     * @return integer
     */
    public function getReId()
    {
        return $this->reId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return RegionsFournisseurs
     */
    public function setFoId($foId)
    {
        $this->foId = $foId;

        return $this;
    }

    /**
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set fcId
     *
     * @param integer $fcId
     *
     * @return RegionsFournisseurs
     */
    public function setFcId($fcId)
    {
        $this->fcId = $fcId;

        return $this;
    }

    /**
     * Get fcId
     *
     * @return integer
     */
    public function getFcId()
    {
        return $this->fcId;
    }

    /**
     * Set usId
     *
     * @param integer $usId
     *
     * @return RegionsFournisseurs
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
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return RegionsFournisseurs
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
     * @return RegionsFournisseurs
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
}
