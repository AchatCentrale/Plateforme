<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="GROUPE")
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="GR_DESCR", type="string", length=100, nullable=true)
     */
    private $grDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="GR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grId;



    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Groupe
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
     * Set grDescr
     *
     * @param string $grDescr
     *
     * @return Groupe
     */
    public function setGrDescr($grDescr)
    {
        $this->grDescr = $grDescr;

        return $this;
    }

    /**
     * Get grDescr
     *
     * @return string
     */
    public function getGrDescr()
    {
        return $this->grDescr;
    }

    /**
     * Get grId
     *
     * @return integer
     */
    public function getGrId()
    {
        return $this->grId;
    }
    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return $this->getGrDescr();
    }
}
