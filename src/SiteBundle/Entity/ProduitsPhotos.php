<?php

namespace SiteBundle\Entity;

/**
 * ProduitsPhotos
 */
class ProduitsPhotos
{
    /**
     * @var string
     */
    private $ppFichier;

    /**
     * @var string
     */
    private $ppType;

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
     * @var integer
     */
    private $ppId;

    /**
     * @var \SiteBundle\Entity\Produits
     */
    private $pr;


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
     * Get ppId
     *
     * @return integer
     */
    public function getPpId()
    {
        return $this->ppId;
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

