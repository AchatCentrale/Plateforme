<?php

namespace FunecapBundle\Entity;

/**
 * ClientsFourn
 */
class ClientsFourn
{
    /**
     * @var integer
     */
    private $cfId;

    /**
     * @var integer
     */
    private $foId;

    /**
     * @var string
     */
    private $cfUser;

    /**
     * @var string
     */
    private $cfPass;

    /**
     * @var \FunecapBundle\Entity\Clients
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
     * @param \FunecapBundle\Entity\Clients $cl
     *
     * @return ClientsFourn
     */
    public function setCl(\FunecapBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \FunecapBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }
}

