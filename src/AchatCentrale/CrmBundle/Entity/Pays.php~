<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="PAYS")
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paId;

    /**
     * @var string
     *
     * @ORM\Column(name="PA_CODE", type="string", length=50, nullable=true)
     */
    private $paCode;

    /**
     * @var string
     *
     * @ORM\Column(name="PA_DESCR", type="string", length=50, nullable=true)
     */
    private $paDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="PA_PROV", type="string", length=50, nullable=true)
     */
    private $paProv;



    /**
     * Get paId
     *
     * @return integer
     */
    public function getPaId()
    {
        return $this->paId;
    }

    /**
     * Set paCode
     *
     * @param string $paCode
     *
     * @return Pays
     */
    public function setPaCode($paCode)
    {
        $this->paCode = $paCode;

        return $this;
    }

    /**
     * Get paCode
     *
     * @return string
     */
    public function getPaCode()
    {
        return $this->paCode;
    }

    /**
     * Set paDescr
     *
     * @param string $paDescr
     *
     * @return Pays
     */
    public function setPaDescr($paDescr)
    {
        $this->paDescr = $paDescr;

        return $this;
    }

    /**
     * Get paDescr
     *
     * @return string
     */
    public function getPaDescr()
    {
        return $this->paDescr;
    }

    /**
     * Set paProv
     *
     * @param string $paProv
     *
     * @return Pays
     */
    public function setPaProv($paProv)
    {
        $this->paProv = $paProv;

        return $this;
    }

    /**
     * Get paProv
     *
     * @return string
     */
    public function getPaProv()
    {
        return $this->paProv;
    }
}
