<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContratsCat
 *
 * @ORM\Table(name="CONTRATS_CAT", indexes={@ORM\Index(name="IDX_AF50DB674D0C1225", columns={"SO_ID"})})
 * @ORM\Entity
 */
class ContratsCat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ccId;

    /**
     * @var string
     *
     * @ORM\Column(name="CC_DESCR", type="string", length=100, nullable=true)
     */
    private $ccDescr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CC_DATE", type="datetime", nullable=true)
     */
    private $ccDate;

    /**
     * @var \AchatCentrale\CrmBundle\Entity\Societes
     *
     * @ORM\ManyToOne(targetEntity="AchatCentrale\CrmBundle\Entity\Societes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SO_ID", referencedColumnName="SO_ID")
     * })
     */
    private $so;



    /**
     * Get ccId
     *
     * @return integer
     */
    public function getCcId()
    {
        return $this->ccId;
    }

    /**
     * Set ccDescr
     *
     * @param string $ccDescr
     *
     * @return ContratsCat
     */
    public function setCcDescr($ccDescr)
    {
        $this->ccDescr = $ccDescr;

        return $this;
    }

    /**
     * Get ccDescr
     *
     * @return string
     */
    public function getCcDescr()
    {
        return $this->ccDescr;
    }

    /**
     * Set ccDate
     *
     * @param \DateTime $ccDate
     *
     * @return ContratsCat
     */
    public function setCcDate($ccDate)
    {
        $this->ccDate = $ccDate;

        return $this;
    }

    /**
     * Get ccDate
     *
     * @return \DateTime
     */
    public function getCcDate()
    {
        return $this->ccDate;
    }

    /**
     * Set so
     *
     * @param \AchatCentrale\CrmBundle\Entity\Societes $so
     *
     * @return ContratsCat
     */
    public function setSo(\AchatCentrale\CrmBundle\Entity\Societes $so = null)
    {
        $this->so = $so;

        return $this;
    }

    /**
     * Get so
     *
     * @return \AchatCentrale\CrmBundle\Entity\Societes
     */
    public function getSo()
    {
        return $this->so;
    }
}
