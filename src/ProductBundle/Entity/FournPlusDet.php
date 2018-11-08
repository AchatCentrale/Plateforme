<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournPlusDet
 *
 * @ORM\Table(name="FOURN_PLUS_DET", indexes={@ORM\Index(name="IDX_AB27A582E50C0AD7", columns={"FO_ID"})})
 * @ORM\Entity
 */
class FournPlusDet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FD_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fdId;

    /**
     * @var string
     *
     * @ORM\Column(name="FD_TYPE", type="string", length=5, nullable=true)
     */
    private $fdType;

    /**
     * @var string
     *
     * @ORM\Column(name="FD_TEXTE", type="text", length=16, nullable=true)
     */
    private $fdTexte;

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
     * @var \ProductBundle\Entity\Fournisseurs
     *
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FO_ID", referencedColumnName="FO_ID")
     * })
     */
    private $fo;


}

