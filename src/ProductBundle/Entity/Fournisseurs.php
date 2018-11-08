<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseurs
 *
 * @ORM\Table(name="FOURNISSEURS")
 * @ORM\Entity
 */
class Fournisseurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_REF", type="string", length=50, nullable=true)
     */
    private $foRef;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_RAISONSOC", type="string", length=100, nullable=true)
     */
    private $foRaisonsoc;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_SIRET", type="string", length=14, nullable=true)
     */
    private $foSiret;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_NOM_COM", type="string", length=50, nullable=true)
     */
    private $foNomCom;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_ADRESSE1", type="string", length=100, nullable=true)
     */
    private $foAdresse1;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_ADRESSE2", type="string", length=100, nullable=true)
     */
    private $foAdresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_CP", type="string", length=10, nullable=true)
     */
    private $foCp;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_VILLE", type="string", length=50, nullable=true)
     */
    private $foVille;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_PAYS", type="string", length=50, nullable=true)
     */
    private $foPays;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_TEL", type="string", length=50, nullable=true)
     */
    private $foTel;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_FAX", type="string", length=50, nullable=true)
     */
    private $foFax;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_MAIL", type="string", length=100, nullable=true)
     */
    private $foMail;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_WEB", type="string", length=100, nullable=true)
     */
    private $foWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_LOGO", type="string", length=200, nullable=true)
     */
    private $foLogo;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_COMM", type="float", precision=53, scale=0, nullable=true)
     */
    private $foComm;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_RFA_SUP", type="float", precision=53, scale=0, nullable=true)
     */
    private $foRfaSup;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_PORT_PAYANT_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $foPortPayantMontant;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_PORT_PAYANT_TEXTE", type="string", length=100, nullable=true)
     */
    private $foPortPayantTexte;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_PORT_OFFERT_QTE", type="integer", nullable=true)
     */
    private $foPortOffertQte;

    /**
     * @var float
     *
     * @ORM\Column(name="FO_PORT_OFFERT_MONTANT", type="float", precision=53, scale=0, nullable=true)
     */
    private $foPortOffertMontant;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ETIQUETABLE", type="integer", nullable=true)
     */
    private $foEtiquetable;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_MESS_SUP", type="string", length=2000, nullable=true)
     */
    private $foMessSup;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_CGV", type="string", length=500, nullable=true)
     */
    private $foCgv;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_STATUS", type="integer", nullable=true)
     */
    private $foStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="FO_TEMPO", type="string", length=50, nullable=true)
     */
    private $foTempo;

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

