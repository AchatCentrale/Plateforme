<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rayons
 *
 * @ORM\Table(name="RAYONS")
 * @ORM\Entity
 */
class Rayons
{
    /**
     * @var integer
     *
     * @ORM\Column(name="RA_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $raId;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_NOM", type="string", length=100, nullable=true)
     */
    private $raNom;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_DESCR", type="text", length=16, nullable=true)
     */
    private $raDescr;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_PICTO", type="string", length=50, nullable=true)
     */
    private $raPicto;

    /**
     * @var integer
     *
     * @ORM\Column(name="RA_TRI", type="integer", nullable=true)
     */
    private $raTri;

    /**
     * @var string
     *
     * @ORM\Column(name="RA_TEMPO", type="string", length=50, nullable=true)
     */
    private $raTempo;

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


}

