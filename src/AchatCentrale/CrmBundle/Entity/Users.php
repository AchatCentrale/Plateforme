<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="USERS")
 * @ORM\Entity
 */
class Users implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="US_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usId;

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

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->getUsPass();
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getUsMail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
