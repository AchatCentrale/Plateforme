<?php

namespace FunecapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsTachesFichiers
 *
 * @ORM\Table(name="CLIENTS_TACHES_FICHIERS", indexes={@ORM\Index(name="IDX_E475767FB14F4B39", columns={"CLA_ID"})})
 * @ORM\Entity
 */
class ClientsTachesFichiers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CTF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ctfId;

    /**
     * @var string
     *
     * @ORM\Column(name="CTF_FICHIER", type="string", length=500, nullable=true)
     */
    private $ctfFichier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CTF_DATE", type="datetime", nullable=true)
     */
    private $ctfDate;

    /**
     * @var \FunecapBundle\Entity\ClientsTaches
     *
     * @ORM\ManyToOne(targetEntity="FunecapBundle\Entity\ClientsTaches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CLA_ID", referencedColumnName="CLA_ID")
     * })
     */
    private $cla;



    /**
     * Get ctfId
     *
     * @return integer
     */
    public function getCtfId()
    {
        return $this->ctfId;
    }

    /**
     * Set ctfFichier
     *
     * @param string $ctfFichier
     *
     * @return ClientsTachesFichiers
     */
    public function setCtfFichier($ctfFichier)
    {
        $this->ctfFichier = $ctfFichier;

        return $this;
    }

    /**
     * Get ctfFichier
     *
     * @return string
     */
    public function getCtfFichier()
    {
        return $this->ctfFichier;
    }

    /**
     * Set ctfDate
     *
     * @param \DateTime $ctfDate
     *
     * @return ClientsTachesFichiers
     */
    public function setCtfDate($ctfDate)
    {
        $this->ctfDate = $ctfDate;

        return $this;
    }

    /**
     * Get ctfDate
     *
     * @return \DateTime
     */
    public function getCtfDate()
    {
        return $this->ctfDate;
    }

    /**
     * Set cla
     *
     * @param \FunecapBundle\Entity\ClientsTaches $cla
     *
     * @return ClientsTachesFichiers
     */
    public function setCla(\FunecapBundle\Entity\ClientsTaches $cla = null)
    {
        $this->cla = $cla;

        return $this;
    }

    /**
     * Get cla
     *
     * @return \FunecapBundle\Entity\ClientsTaches
     */
    public function getCla()
    {
        return $this->cla;
    }
}
