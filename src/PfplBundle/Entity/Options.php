<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="OPTIONS")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @ORM\Column(name="OP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $opId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="OP_DESCR", type="string", length=100, nullable=true)
     */
    private $opDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="OP_FORMAT", type="string", length=50, nullable=true)
     */
    private $opFormat;



    /**
     * Get opId
     *
     * @return integer
     */
    public function getOpId()
    {
        return $this->opId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Options
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
     * Set opDescr
     *
     * @param string $opDescr
     *
     * @return Options
     */
    public function setOpDescr($opDescr)
    {
        $this->opDescr = $opDescr;

        return $this;
    }

    /**
     * Get opDescr
     *
     * @return string
     */
    public function getOpDescr()
    {
        return $this->opDescr;
    }

    /**
     * Set opFormat
     *
     * @param string $opFormat
     *
     * @return Options
     */
    public function setOpFormat($opFormat)
    {
        $this->opFormat = $opFormat;

        return $this;
    }

    /**
     * Get opFormat
     *
     * @return string
     */
    public function getOpFormat()
    {
        return $this->opFormat;
    }
}
