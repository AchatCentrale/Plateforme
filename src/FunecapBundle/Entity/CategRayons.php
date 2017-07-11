<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategRayons
 *
 * @ORM\Table(name="CATEG_RAYONS")
 * @ORM\Entity
 */
class CategRayons
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $crId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RA_ID", type="integer", nullable=true)
     */
    private $raId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CatID", type="integer", nullable=true)
     */
    private $catid;



    /**
     * Get crId
     *
     * @return integer
     */
    public function getCrId()
    {
        return $this->crId;
    }

    /**
     * Set raId
     *
     * @param integer $raId
     *
     * @return CategRayons
     */
    public function setRaId($raId)
    {
        $this->raId = $raId;

        return $this;
    }

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
     * Set catid
     *
     * @param integer $catid
     *
     * @return CategRayons
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Get catid
     *
     * @return integer
     */
    public function getCatid()
    {
        return $this->catid;
    }
}
