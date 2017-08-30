<?php

namespace ProductBundle\Entity;

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
     * @var \ProductBundle\Entity\Produits
     *
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PR_ID", referencedColumnName="PR_ID")
     * })
     */
    private $pr;

    /**
     * @var \ProductBundle\Entity\Filtres
     *
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Filtres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FI_ID", referencedColumnName="FI_ID")
     * })
     */
    private $fi;


}

