<?php

namespace FunecapBundle\Entity;

/**
 * Users
 */
class Users
{
    /**
     * @var integer
     */
    private $usId;

    /**
     * @var string
     */
    private $usPrenom;

    /**
     * @var string
     */
    private $usNom;

    /**
     * @var string
     */
    private $usMail;

    /**
     * @var string
     */
    private $usPass;

    /**
     * @var integer
     */
    private $usNiveau;

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
     * Get usId
     *
     * @return integer
     */
    public function getUsId()
    {
        return $this->usId;
    }

    /**
     * Set usPrenom
     *
     * @param string $usPrenom
     *
     * @return Users
     */
    public function setUsPrenom($usPrenom)
    {
        $this->usPrenom = $usPrenom;

        return $this;
    }

    /**
     * Get usPrenom
     *
     * @return string
     */
    public function getUsPrenom()
    {
        return $this->usPrenom;
    }

    /**
     * Set usNom
     *
     * @param string $usNom
     *
     * @return Users
     */
    public function setUsNom($usNom)
    {
        $this->usNom = $usNom;

        return $this;
    }

    /**
     * Get usNom
     *
     * @return string
     */
    public function getUsNom()
    {
        return $this->usNom;
    }

    /**
     * Set usMail
     *
     * @param string $usMail
     *
     * @return Users
     */
    public function setUsMail($usMail)
    {
        $this->usMail = $usMail;

        return $this;
    }

    /**
     * Get usMail
     *
     * @return string
     */
    public function getUsMail()
    {
        return $this->usMail;
    }

    /**
     * Set usPass
     *
     * @param string $usPass
     *
     * @return Users
     */
    public function setUsPass($usPass)
    {
        $this->usPass = $usPass;

        return $this;
    }

    /**
     * Get usPass
     *
     * @return string
     */
    public function getUsPass()
    {
        return $this->usPass;
    }

    /**
     * Set usNiveau
     *
     * @param integer $usNiveau
     *
     * @return Users
     */
    public function setUsNiveau($usNiveau)
    {
        $this->usNiveau = $usNiveau;

        return $this;
    }

    /**
     * Get usNiveau
     *
     * @return integer
     */
    public function getUsNiveau()
    {
        return $this->usNiveau;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
}

