<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="USERS")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var string
     *
     * @ORM\Column(name="US_PRENOM", type="string", length=50, nullable=true)
     */
    private $usPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="US_NOM", type="string", length=50, nullable=true)
     */
    private $usNom;

    /**
     * @var string
     *
     * @ORM\Column(name="US_MAIL", type="string", length=100, nullable=true)
     */
    private $usMail;

    /**
     * @var string
     *
     * @ORM\Column(name="US_PASS", type="string", length=50, nullable=true)
     */
    private $usPass;

    /**
     * @var integer
     *
     * @ORM\Column(name="US_NIVEAU", type="integer", nullable=true)
     */
    private $usNiveau;

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
     * @ORM\Column(name="US_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usId;



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

    /**
     * Get usId
     *
     * @return integer
     */
    public function getUsId()
    {
        return $this->usId;
    }
}
