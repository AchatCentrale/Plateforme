<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilsUsers
 *
 * @ORM\Table(name="PROFILS_USERS")
 * @ORM\Entity
 */
class ProfilsUsers
{
    /**
     * @var string
     *
     * @ORM\Column(name="PU_DESCR", type="string", length=50, nullable=true)
     */
    private $puDescr;

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
     * @ORM\Column(name="PU_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $puId;



    /**
     * Set puDescr
     *
     * @param string $puDescr
     *
     * @return ProfilsUsers
     */
    public function setPuDescr($puDescr)
    {
        $this->puDescr = $puDescr;

        return $this;
    }

    /**
     * Get puDescr
     *
     * @return string
     */
    public function getPuDescr()
    {
        return $this->puDescr;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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
     * @return ProfilsUsers
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
     * Get puId
     *
     * @return integer
     */
    public function getPuId()
    {
        return $this->puId;
    }
}
