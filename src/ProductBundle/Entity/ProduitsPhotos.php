<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitsPhotos
 *
 * @ORM\Table(name="PRODUITS_PHOTOS", indexes={@ORM\Index(name="IDX_35378605A8DFE7B7", columns={"PR_ID"})})
 * @ORM\Entity
 */
class ProduitsPhotos
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
     * @var string
     *
     * @ORM\Column(name="PP_FICHIER", type="string", length=100, nullable=true)
     */
    private $ppFichier;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_TYPE", type="string", length=50, nullable=true)
     */
    private $ppType;

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
     * @var \DateTime
     *
     * @ORM\Column(name="MAJ_DATE", type="datetime", nullable=true)
     */
    private $majDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MAJ_USER", type="string", length=100, nullable=true)
     */
    private $majUser;

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

