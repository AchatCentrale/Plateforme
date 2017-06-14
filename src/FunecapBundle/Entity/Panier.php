<?php

namespace FunecapBundle\Entity;

/**
 * Panier
 */
class Panier
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $meId;

    /**
     * @var integer
     */
    private $idCommande;

    /**
     * @var integer
     */
    private $prId;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var float
     */
    private $prixUht;

    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
     */
    private $insUser;

    /**
     * @var \DateTime
     */
    private $majDate;

    /**
     * @var string
     */
    private $majUser;

    /**
     * @var \FunecapBundle\Entity\Clients
     */
    private $cl;


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
     * Set cl
     *
     * @param \FunecapBundle\Entity\Clients $cl
     *
     * @return Panier
     */
    public function setCl(\FunecapBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \FunecapBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}

