<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilsFourn
 *
 * @ORM\Table(name="PROFILS_FOURN", indexes={@ORM\Index(name="IDX_84165EC03508DF0E", columns={"PU_ID"})})
 * @ORM\Entity
 */
class ProfilsFourn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

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
     * @var \FunecapBundle\Entity\ProfilsUsers
     *
     * @ORM\ManyToOne(targetEntity="FunecapBundle\Entity\ProfilsUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PU_ID", referencedColumnName="PU_ID")
     * })
     */
    private $pu;



    /**
     * Get pfId
     *
     * @return integer
     */
    public function getPfId()
    {
        return $this->pfId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return ProfilsFourn
     */
    public function setFoId($foId)
    {
        $this->foId = $foId;

        return $this;
    }

    /**
     * Get foId
     *
     * @return integer
     */
    public function getFoId()
    {
        return $this->foId;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * @return ProfilsFourn
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
     * Set pu
     *
     * @param \FunecapBundle\Entity\ProfilsUsers $pu
     *
     * @return ProfilsFourn
     */
    public function setPu(\FunecapBundle\Entity\ProfilsUsers $pu = null)
    {
        $this->pu = $pu;

        return $this;
    }

    /**
     * Get pu
     *
     * @return \FunecapBundle\Entity\ProfilsUsers
     */
    public function getPu()
    {
        return $this->pu;
    }
}
