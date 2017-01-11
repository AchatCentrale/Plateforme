<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activites
 *
 * @ORM\Table(name="ACTIVITES")
 * @ORM\Entity
 */
class Activites
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
     * @ORM\Column(name="AC_DESCR", type="string", length=100, nullable=true)
     */
    private $acDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="AC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acId;



    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Activites
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
     * Set acDescr
     *
     * @param string $acDescr
     *
     * @return Activites
     */
    public function setAcDescr($acDescr)
    {
        $this->acDescr = $acDescr;

        return $this;
    }

    /**
     * Get acDescr
     *
     * @return string
     */
    public function getAcDescr()
    {
        return $this->acDescr;
    }

    /**
     * Get acId
     *
     * @return integer
     */
    public function getAcId()
    {
        return $this->acId;
    }

    /**
     * toString
     * @return string
     */
    public function __toString()
    {
        return $this->getAcDescr();
    }
}
