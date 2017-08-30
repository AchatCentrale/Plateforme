<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournPlus
 *
 * @ORM\Table(name="FOURN_PLUS")
 * @ORM\Entity
 */
class FournPlus
{
    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF_TITRE1", type="string", length=100, nullable=true)
     */
    private $fpPdfTitre1;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF1", type="string", length=100, nullable=true)
     */
    private $fpPdf1;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF_TITRE2", type="string", length=100, nullable=true)
     */
    private $fpPdfTitre2;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PDF2", type="string", length=100, nullable=true)
     */
    private $fpPdf2;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_PLUS", type="string", length=2000, nullable=true)
     */
    private $fpPlus;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_CONSEILS", type="string", length=2000, nullable=true)
     */
    private $fpConseils;

    /**
     * @var string
     *
     * @ORM\Column(name="FP_TEMPO", type="string", length=50, nullable=true)
     */
    private $fpTempo;

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
     * @ORM\OneToOne(targetEntity="ProductBundle\Entity\Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FO_ID", referencedColumnName="FO_ID", unique=true)
     * })
     */
    private $fo;


}

