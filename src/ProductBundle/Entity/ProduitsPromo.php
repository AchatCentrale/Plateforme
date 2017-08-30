<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitsPromo
 *
 * @ORM\Table(name="PRODUITS_PROMO", indexes={@ORM\Index(name="IDX_29E091BEA8DFE7B7", columns={"PR_ID"})})
 * @ORM\Entity
 */
class ProduitsPromo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ORDRE", type="integer", nullable=true)
     */
    private $ppOrdre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PP_DATE", type="datetime", nullable=true)
     */
    private $ppDate;

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


}

