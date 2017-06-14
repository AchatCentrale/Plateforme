<?php

namespace FunecapBundle\Entity;

/**
 * ClientsOptions
 */
class ClientsOptions
{
    /**
     * @var integer
     */
    private $coId;

    /**
     * @var string
     */
    private $coReponse;

    /**
     * @var \FunecapBundle\Entity\Clients
     */
    private $cl;

    /**
     * @var \FunecapBundle\Entity\Options
     */
    private $op;


    /**
     * Get coId
     *
     * @return integer
     */
    public function getCoId()
    {
        return $this->coId;
    }

    /**
     * Set coReponse
     *
     * @param string $coReponse
     *
     * @return ClientsOptions
     */
    public function setCoReponse($coReponse)
    {
        $this->coReponse = $coReponse;

        return $this;
    }

    /**
     * Get coReponse
     *
     * @return string
     */
    public function getCoReponse()
    {
        return $this->coReponse;
    }

    /**
     * Set cl
     *
     * @param \FunecapBundle\Entity\Clients $cl
     *
     * @return ClientsOptions
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

    /**
     * Set op
     *
     * @param \FunecapBundle\Entity\Options $op
     *
     * @return ClientsOptions
     */
    public function setOp(\FunecapBundle\Entity\Options $op = null)
    {
        $this->op = $op;

        return $this;
    }

    /**
     * Get op
     *
     * @return \FunecapBundle\Entity\Options
     */
    public function getOp()
    {
        return $this->op;
    }
}

