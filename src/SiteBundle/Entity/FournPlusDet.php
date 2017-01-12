<?php

namespace SiteBundle\Entity;

/**
 * FournPlusDet
 */
class FournPlusDet
{
    /**
     * @var string
     */
    private $fdType;

    /**
     * @var string
     */
    private $fdTexte;

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
    private $fdId;

    /**
     * @var \SiteBundle\Entity\Fournisseurs
     */
    private $fo;


    /**
     * Set fdType
     *
     * @param string $fdType
     *
     * @return FournPlusDet
     */
    public function setFdType($fdType)
    {
        $this->fdType = $fdType;

        return $this;
    }

    /**
     * Get fdType
     *
     * @return string
     */
    public function getFdType()
    {
        return $this->fdType;
    }

    /**
     * Set fdTexte
     *
     * @param string $fdTexte
     *
     * @return FournPlusDet
     */
    public function setFdTexte($fdTexte)
    {
        $this->fdTexte = $fdTexte;

        return $this;
    }

    /**
     * Get fdTexte
     *
     * @return string
     */
    public function getFdTexte()
    {
        return $this->fdTexte;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * @return FournPlusDet
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
     * Get fdId
     *
     * @return integer
     */
    public function getFdId()
    {
        return $this->fdId;
    }

    /**
     * Set fo
     *
     * @param \SiteBundle\Entity\Fournisseurs $fo
     *
     * @return FournPlusDet
     */
    public function setFo(\SiteBundle\Entity\Fournisseurs $fo = null)
    {
        $this->fo = $fo;

        return $this;
    }

    /**
     * Get fo
     *
     * @return \SiteBundle\Entity\Fournisseurs
     */
    public function getFo()
    {
        return $this->fo;
    }
}

