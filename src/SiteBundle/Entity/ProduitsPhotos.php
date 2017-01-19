<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitsPhotos
 *
 * @ORM\Table(name="PRODUITS_PHOTOS", indexes={@ORM\Index(name="IDX_35378605A8DFE7B7", columns={"PR_ID"})})
 * @ORM\Entity
 */
class ProduitsPhotos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppId;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_FICHIER", type="string", length=100, nullable=true)
     */
    private $ppFichier;

    /**
     * @var string
     *
     * @ORM\Column(name="PP_TYPE", type="string", length=50, nullable=true)
     */
    private $ppType;

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
     * @var \SiteBundle\Entity\Produits
     *
     * @ORM\ManyToOne(targetEntity="SiteBundle\Entity\Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PR_ID", referencedColumnName="PR_ID")
     * })
     */
    private $pr;



    /**
     * Get ppId
     *
     * @return integer
     */
    public function getPpId()
    {
        return $this->ppId;
    }

    /**
     * Set ppFichier
     *
     * @param string $ppFichier
     *
     * @return ProduitsPhotos
     */
    public function setPpFichier($ppFichier)
    {
        $this->ppFichier = $ppFichier;

        return $this;
    }

    /**
     * Get ppFichier
     *
     * @return string
     */
    public function getPpFichier()
    {
        return $this->ppFichier;
    }

    /**
     * Set ppType
     *
     * @param string $ppType
     *
     * @return ProduitsPhotos
     */
    public function setPpType($ppType)
    {
        $this->ppType = $ppType;

        return $this;
    }

    /**
     * Get ppType
     *
     * @return string
     */
    public function getPpType()
    {
        return $this->ppType;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProduitsPhotos
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
     * @return ProduitsPhotos
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
     * @return ProduitsPhotos
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
     * @return ProduitsPhotos
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
     * Set pr
     *
     * @param \SiteBundle\Entity\Produits $pr
     *
     * @return ProduitsPhotos
     */
    public function setPr(\SiteBundle\Entity\Produits $pr = null)
    {
        $this->pr = $pr;

        return $this;
    }

    /**
     * Get pr
     *
     * @return \SiteBundle\Entity\Produits
     */
    public function getPr()
    {
        return $this->pr;
    }
}
