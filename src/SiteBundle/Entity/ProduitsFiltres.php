<?php

namespace SiteBundle\Entity;

/**
 * ProduitsFiltres
 */
class ProduitsFiltres
{
    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
     */
    private $insUser;

    /**
     * @var integer
     */
    private $pfId;

    /**
     * @var \SiteBundle\Entity\Produits
     */
    private $pr;

    /**
     * @var \SiteBundle\Entity\Filtres
     */
    private $fi;


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
     * Get pfId
     *
     * @return integer
     */
    public function getPfId()
    {
        return $this->pfId;
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

