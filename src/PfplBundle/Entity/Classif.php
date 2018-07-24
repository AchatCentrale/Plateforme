<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classif
 *
 * @ORM\Table(name="CLASSIF")
 * @ORM\Entity
 */
class Classif
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="CL_DESCR", type="string", length=100, nullable=true)
     */
    private $clDescr;



    /**
     * Get clId
     *
     * @return integer
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Classif
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
     * Set clDescr
     *
     * @param string $clDescr
     *
     * @return Classif
     */
    public function setClDescr($clDescr)
    {
        $this->clDescr = $clDescr;

        return $this;
    }

    /**
     * Get clDescr
     *
     * @return string
     */
    public function getClDescr()
    {
        return $this->clDescr;
    }
}
