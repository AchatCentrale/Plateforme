<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageFichiers
 *
 * @ORM\Table(name="MESSAGE_FICHIERS", indexes={@ORM\Index(name="IDX_6998CDC7FD61DBA2", columns={"ME_ID"})})
 * @ORM\Entity
 */
class MessageFichiers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="MF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="MD_ID", type="integer", nullable=true)
     */
    private $mdId;

    /**
     * @var string
     *
     * @ORM\Column(name="MF_FICHIER", type="string", length=200, nullable=true)
     */
    private $mfFichier;

    /**
     * @var float
     *
     * @ORM\Column(name="MF_TAILLE", type="float", precision=53, scale=0, nullable=true)
     */
    private $mfTaille;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="MF_DATE", type="datetime", nullable=true)
     */
    private $mfDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MF_TEMPO", type="string", length=50, nullable=true)
     */
    private $mfTempo;

    /**
     * @var \GccpBundle\Entity\MessageEntete
     *
     * @ORM\ManyToOne(targetEntity="GccpBundle\Entity\MessageEntete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ME_ID", referencedColumnName="ME_ID")
     * })
     */
    private $me;



    /**
     * Get mfId
     *
     * @return integer
     */
    public function getMfId()
    {
        return $this->mfId;
    }

    /**
     * Set mdId
     *
     * @param integer $mdId
     *
     * @return MessageFichiers
     */
    public function setMdId($mdId)
    {
        $this->mdId = $mdId;

        return $this;
    }

    /**
     * Get mdId
     *
     * @return integer
     */
    public function getMdId()
    {
        return $this->mdId;
    }

    /**
     * Set mfFichier
     *
     * @param string $mfFichier
     *
     * @return MessageFichiers
     */
    public function setMfFichier($mfFichier)
    {
        $this->mfFichier = $mfFichier;

        return $this;
    }

    /**
     * Get mfFichier
     *
     * @return string
     */
    public function getMfFichier()
    {
        return $this->mfFichier;
    }

    /**
     * Set mfTaille
     *
     * @param float $mfTaille
     *
     * @return MessageFichiers
     */
    public function setMfTaille($mfTaille)
    {
        $this->mfTaille = $mfTaille;

        return $this;
    }

    /**
     * Get mfTaille
     *
     * @return float
     */
    public function getMfTaille()
    {
        return $this->mfTaille;
    }

    /**
     * Set mfDate
     *
     * @param \DateTime $mfDate
     *
     * @return MessageFichiers
     */
    public function setMfDate($mfDate)
    {
        $this->mfDate = $mfDate;

        return $this;
    }

    /**
     * Get mfDate
     *
     * @return \DateTime
     */
    public function getMfDate()
    {
        return $this->mfDate;
    }

    /**
     * Set mfTempo
     *
     * @param string $mfTempo
     *
     * @return MessageFichiers
     */
    public function setMfTempo($mfTempo)
    {
        $this->mfTempo = $mfTempo;

        return $this;
    }

    /**
     * Get mfTempo
     *
     * @return string
     */
    public function getMfTempo()
    {
        return $this->mfTempo;
    }

    /**
     * Set me
     *
     * @param \GccpBundle\Entity\MessageEntete $me
     *
     * @return MessageFichiers
     */
    public function setMe(\GccpBundle\Entity\MessageEntete $me = null)
    {
        $this->me = $me;

        return $this;
    }

    /**
     * Get me
     *
     * @return \GccpBundle\Entity\MessageEntete
     */
    public function getMe()
    {
        return $this->me;
    }
}
