<?php

namespace GccpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsFourn
 *
 * @ORM\Table(name="CLIENTS_FOURN", indexes={@ORM\Index(name="IDX_A04F9C213F592A49", columns={"CL_ID"})})
 * @ORM\Entity
 */
class ClientsFourn
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

    /**
     * @var string
     *
     * @ORM\Column(name="CF_USER", type="string", length=100, nullable=true)
     */
    private $cfUser;

    /**
     * @var string
     *
     * @ORM\Column(name="CF_PASS", type="string", length=50, nullable=true)
     */
    private $cfPass;

    /**
     * @var \GccpBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="GccpBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CL_ID", referencedColumnName="CL_ID")
     * })
     */
    private $cl;



    /**
     * Get cfId
     *
     * @return integer
     */
    public function getCfId()
    {
        return $this->cfId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return ClientsFourn
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
     * Set cfUser
     *
     * @param string $cfUser
     *
     * @return ClientsFourn
     */
    public function setCfUser($cfUser)
    {
        $this->cfUser = $cfUser;

        return $this;
    }

    /**
     * Get cfUser
     *
     * @return string
     */
    public function getCfUser()
    {
        return $this->cfUser;
    }

    /**
     * Set cfPass
     *
     * @param string $cfPass
     *
     * @return ClientsFourn
     */
    public function setCfPass($cfPass)
    {
        $this->cfPass = $cfPass;

        return $this;
    }

    /**
     * Get cfPass
     *
     * @return string
     */
    public function getCfPass()
    {
        return $this->cfPass;
    }

    /**
     * Set cl
     *
     * @param \GccpBundle\Entity\Clients $cl
     *
     * @return ClientsFourn
     */
    public function setCl(\GccpBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \GccpBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}
