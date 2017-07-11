<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Textes
 *
 * @ORM\Table(name="Textes", indexes={@ORM\Index(name="IDX_5BFAE4E45919F4AB", columns={"CatID"})})
 * @ORM\Entity
 */
class Textes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="TxtID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $txtid;

    /**
     * @var string
     *
     * @ORM\Column(name="TxtTitre", type="string", length=100, nullable=true)
     */
    private $txttitre;

    /**
     * @var string
     *
     * @ORM\Column(name="TxtDescription", type="string", length=7900, nullable=true)
     */
    private $txtdescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="TxtSort", type="integer", nullable=true)
     */
    private $txtsort;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TxtSortDt", type="datetime", nullable=true)
     */
    private $txtsortdt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TxtDate", type="datetime", nullable=true)
     */
    private $txtdate;

    /**
     * @var \FunecapBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="FunecapBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CatID", referencedColumnName="CatID")
     * })
     */
    private $catid;



    /**
     * Get txtid
     *
     * @return integer
     */
    public function getTxtid()
    {
        return $this->txtid;
    }

    /**
     * Set txttitre
     *
     * @param string $txttitre
     *
     * @return Textes
     */
    public function setTxttitre($txttitre)
    {
        $this->txttitre = $txttitre;

        return $this;
    }

    /**
     * Get txttitre
     *
     * @return string
     */
    public function getTxttitre()
    {
        return $this->txttitre;
    }

    /**
     * Set txtdescription
     *
     * @param string $txtdescription
     *
     * @return Textes
     */
    public function setTxtdescription($txtdescription)
    {
        $this->txtdescription = $txtdescription;

        return $this;
    }

    /**
     * Get txtdescription
     *
     * @return string
     */
    public function getTxtdescription()
    {
        return $this->txtdescription;
    }

    /**
     * Set txtsort
     *
     * @param integer $txtsort
     *
     * @return Textes
     */
    public function setTxtsort($txtsort)
    {
        $this->txtsort = $txtsort;

        return $this;
    }

    /**
     * Get txtsort
     *
     * @return integer
     */
    public function getTxtsort()
    {
        return $this->txtsort;
    }

    /**
     * Set txtsortdt
     *
     * @param \DateTime $txtsortdt
     *
     * @return Textes
     */
    public function setTxtsortdt($txtsortdt)
    {
        $this->txtsortdt = $txtsortdt;

        return $this;
    }

    /**
     * Get txtsortdt
     *
     * @return \DateTime
     */
    public function getTxtsortdt()
    {
        return $this->txtsortdt;
    }

    /**
     * Set txtdate
     *
     * @param \DateTime $txtdate
     *
     * @return Textes
     */
    public function setTxtdate($txtdate)
    {
        $this->txtdate = $txtdate;

        return $this;
    }

    /**
     * Get txtdate
     *
     * @return \DateTime
     */
    public function getTxtdate()
    {
        return $this->txtdate;
    }

    /**
     * Set catid
     *
     * @param \FunecapBundle\Entity\Categories $catid
     *
     * @return Textes
     */
    public function setCatid(\FunecapBundle\Entity\Categories $catid = null)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Get catid
     *
     * @return \FunecapBundle\Entity\Categories
     */
    public function getCatid()
    {
        return $this->catid;
    }
}
