<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitsFiltres
 *
 * @ORM\Table(name="PRODUITS_FILTRES", indexes={@ORM\Index(name="IDX_D0ABA9BFA8DFE7B7", columns={"PR_ID"}), @ORM\Index(name="IDX_D0ABA9BFC067550B", columns={"FI_ID"})})
 * @ORM\Entity
 */
class ProduitsFiltres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pfId;

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
     * @var \SiteBundle\Entity\Produits
     *
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PR_ID", referencedColumnName="PR_ID")
     * })
     */
    private $pr;

    /**
     * @var \SiteBundle\Entity\Filtres
     *
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Filtres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FI_ID", referencedColumnName="FI_ID")
     * })
     */
    private $fi;



    /**
     * Get pfId
     *
     * @return integer
     */
    public function getPfId()
    {
        return $this->pfId;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProduitsFiltres
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
     * @return ProduitsFiltres
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
     * Set pr
     *
     * @param \SiteBundle\Entity\Produits $pr
     *
     * @return ProduitsFiltres
     */
    public function setPr(\SiteBundle\Entity\Produits $pr = null)
    {
        $this->pr = $pr;

        return $this;
    }

    /**
     * Get pr
     *
     * @return \SiteBundle\Entity\Produits
     */
    public function getPr()
    {
        return $this->pr;
    }

    /**
     * Set fi
     *
     * @param \SiteBundle\Entity\Filtres $fi
     *
     * @return ProduitsFiltres
     */
    public function setFi(\SiteBundle\Entity\Filtres $fi = null)
    {
        $this->fi = $fi;

        return $this;
    }

    /**
     * Get fi
     *
     * @return \SiteBundle\Entity\Filtres
     */
    public function getFi()
    {
        return $this->fi;
    }
}
