<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournUsers
 *
 * @ORM\Table(name="FOURN_USERS", indexes={@ORM\Index(name="IDX_D914EAADE50C0AD7", columns={"FO_ID"})})
 * @ORM\Entity
 */
class FournUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $fcId;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_PRENOM", type="string", length=50, nullable=true)
     */
    private $fcPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_NOM", type="string", length=50, nullable=true)
     */
    private $fcNom;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_FONCTION", type="string", length=50, nullable=true)
     */
    private $fcFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_TEL", type="string", length=50, nullable=true)
     */
    private $fcTel;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_GSM", type="string", length=50, nullable=true)
     */
    private $fcGsm;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_FAX", type="string", length=50, nullable=true)
     */
    private $fcFax;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_MAIL", type="string", length=100, nullable=true)
     */
    private $fcMail;

    /**
     * @var string
     *
     * @ORM\Column(name="FC_PASS", type="string", length=50, nullable=true)
     */
    private $fcPass;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_NIVEAU", type="integer", nullable=true)
     */
    private $fcNiveau;

    /**
     * @var integer
     *
     * @ORM\Column(name="FC_STATUS", type="integer", nullable=true)
     */
    private $fcStatus;

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

