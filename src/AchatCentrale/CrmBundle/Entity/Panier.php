<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="PANIER", indexes={@ORM\Index(name="IDX_D434CA743F592A49", columns={"CL_ID"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ME_ID", type="integer", nullable=true)
     */
    private $meId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_COMMANDE", type="integer", nullable=true)
     */
    private $idCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer", nullable=true)
     */
    private $prId;

    /**
     * @var integer
     *
     * @ORM\Column(name="QUANTITE", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="PRIX_UHT", type="float", precision=53, scale=0, nullable=true)
     */
    private $prixUht;

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
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AchatCentrale\CrmBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="AchatCentrale\CrmBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CL_ID", referencedColumnName="CL_ID")
     * })
     */
    private $cl;



    /**
     * Set meId
     *
     * @param integer $meId
     *
     * @return Panier
     */
    public function setMeId($meId)
    {
        $this->meId = $meId;

        return $this;
    }

    /**
     * Get meId
     *
     * @return integer
     */
    public function getMeId()
    {
        return $this->meId;
    }

    /**
     * Set idCommande
     *
     * @param integer $idCommande
     *
     * @return Panier
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get idCommande
     *
     * @return integer
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Set prId
     *
     * @param integer $prId
     *
     * @return Panier
     */
    public function setPrId($prId)
    {
        $this->prId = $prId;

        return $this;
    }

    /**
     * Get prId
     *
     * @return integer
     */
    public function getPrId()
    {
        return $this->prId;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Panier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prixUht
     *
     * @param float $prixUht
     *
     * @return Panier
     */
    public function setPrixUht($prixUht)
    {
        $this->prixUht = $prixUht;

        return $this;
    }

    /**
     * Get prixUht
     *
     * @return float
     */
    public function getPrixUht()
    {
        return $this->prixUht;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Panier
     */
    public function setInsDate($insDate)
    {
        $this->insDate = $insDate;

        return $this;
    }

    /**
     * Get insDate
     *
     * @return \DateTime
     */
    public function getInsDate()
    {
        return $this->insDate;
    }

    /**
     * Set insUser
     *
     * @param string $insUser
     *
     * @return Panier
     */
    public function setInsUser($insUser)
    {
        $this->insUser = $insUser;

        return $this;
    }

    /**
     * Get insUser
     *
     * @return string
     */
    public function getInsUser()
    {
        return $this->insUser;
    }

    /**
     * Set majDate
     *
     * @param \DateTime $majDate
     *
     * @return Panier
     */
    public function setMajDate($majDate)
    {
        $this->majDate = $majDate;

        return $this;
    }

    /**
     * Get majDate
     *
     * @return \DateTime
     */
    public function getMajDate()
    {
        return $this->majDate;
    }

    /**
     * Set majUser
     *
     * @param string $majUser
     *
     * @return Panier
     */
    public function setMajUser($majUser)
    {
        $this->majUser = $majUser;

        return $this;
    }

    /**
     * Get majUser
     *
     * @return string
     */
    public function getMajUser()
    {
        return $this->majUser;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cl
     *
     * @param \AchatCentrale\CrmBundle\Entity\Clients $cl
     *
     * @return Panier
     */
    public function setCl(\AchatCentrale\CrmBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \AchatCentrale\CrmBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}
