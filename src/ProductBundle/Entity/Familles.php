<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familles
 *
 * @ORM\Table(name="FAMILLES", indexes={@ORM\Index(name="IDX_59A7616B90B34CA6", columns={"RA_ID"})})
 * @ORM\Entity
 */
class Familles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $faId;

    /**
     * @var string
     *
     * @ORM\Column(name="FA_NOM", type="string", length=100, nullable=true)
     */
    private $faNom;

    /**
     * @var string
     *
     * @ORM\Column(name="FA_DESCR", type="text", length=16, nullable=true)
     */
    private $faDescr;

    /**
     * @var integer
     *
     * @ORM\Column(name="FA_TRI", type="integer", nullable=true)
     */
    private $faTri;

    /**
     * @var string
     *
     * @ORM\Column(name="FA_TEMPO", type="string", length=50, nullable=true)
     */
    private $faTempo;

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
     * @var \ProductBundle\Entity\Rayons
     *
     * @ORM\ManyToOne(targetEntity="ProductBundle\Entity\Rayons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RA_ID", referencedColumnName="RA_ID")
     * })
     */
    private $ra;


}

