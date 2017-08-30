<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="PRODUITS")
 * @ORM\Entity
 */
class Produits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="RA_ID", type="integer", nullable=true)
     */
    private $raId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FA_ID", type="integer", nullable=true)
     */
    private $faId;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_REF", type="string", length=100, nullable=true)
     */
    private $prRef;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_REF_FRS", type="string", length=100, nullable=true)
     */
    private $prRefFrs;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_EAN", type="string", length=20, nullable=true)
     */
    private $prEan;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_NOM", type="string", length=200, nullable=true)
     */
    private $prNom;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_DESCR_COURTE", type="string", length=500, nullable=true)
     */
    private $prDescrCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_DESCR_LONGUE", type="string", length=7000, nullable=true)
     */
    private $prDescrLongue;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TRIPTYQUE", type="string", length=50, nullable=true)
     */
    private $prTriptyque;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_QTE_CMDE", type="integer", nullable=true)
     */
    private $prQteCmde;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_CONDT", type="string", length=100, nullable=true)
     */
    private $prCondt;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_PRIX_PUBLIC", type="float", precision=53, scale=0, nullable=true)
     */
    private $prPrixPublic;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_PRIX_CA", type="float", precision=53, scale=0, nullable=true)
     */
    private $prPrixCa;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_REMISE", type="float", precision=53, scale=0, nullable=true)
     */
    private $prRemise;

    /**
     * @var float
     *
     * @ORM\Column(name="PR_PRIX_VC", type="float", precision=53, scale=0, nullable=true)
     */
    private $prPrixVc;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TYPE_LIEN", type="string", length=50, nullable=true)
     */
    private $prTypeLien;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_LIEN", type="string", length=500, nullable=true)
     */
    private $prLien;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_PHARE", type="integer", nullable=true)
     */
    private $prPhare;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_STATUS", type="integer", nullable=true)
     */
    private $prStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="PR_TEMPO", type="string", length=50, nullable=true)
     */
    private $prTempo;

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

