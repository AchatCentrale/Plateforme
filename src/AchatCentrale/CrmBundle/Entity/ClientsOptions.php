<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsOptions
 *
 * @ORM\Table(name="CLIENTS_OPTIONS", indexes={@ORM\Index(name="IDX_74C57C7D3F592A49", columns={"CL_ID"}), @ORM\Index(name="IDX_74C57C7DE0662F6F", columns={"OP_ID"})})
 * @ORM\Entity
 */
class ClientsOptions
{
    /**
     * @var string
     *
     * @ORM\Column(name="CO_REPONSE", type="string", length=500, nullable=true)
     */
    private $coReponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="CO_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coId;

    /**
     * @var \AchatCentrale\CrmBundle\Entity\Clients
     *
     * @ORM\ManyToOne(targetEntity="AchatCentrale\CrmBundle\Entity\Clients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CL_ID", referencedColumnName="CL_ID")
     * })
     */
    private $cl;

    /**
     * @var \AchatCentrale\CrmBundle\Entity\Options
     *
     * @ORM\ManyToOne(targetEntity="AchatCentrale\CrmBundle\Entity\Options")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="OP_ID", referencedColumnName="OP_ID")
     * })
     */
    private $op;



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
     * Get coId
     *
     * @return integer
     */
    public function getCoId()
    {
        return $this->coId;
    }

    /**
     * Set cl
     *
     * @param \AchatCentrale\CrmBundle\Entity\Clients $cl
     *
     * @return ClientsOptions
     */
    public function setCl(\AchatCentrale\CrmBundle\Entity\Clients $cl = null)
    {
        $this->cl = $cl;

        return $this;
    }

    /**
     * Get cl
     *
     * @return \AchatCentrale\CrmBundle\Entity\Clients
     */
    public function getCl()
    {
        return $this->cl;
    }

    /**
     * Set op
     *
     * @param \AchatCentrale\CrmBundle\Entity\Options $op
     *
     * @return ClientsOptions
     */
    public function setOp(\AchatCentrale\CrmBundle\Entity\Options $op = null)
    {
        $this->op = $op;

        return $this;
    }

    /**
     * Get op
     *
     * @return \AchatCentrale\CrmBundle\Entity\Options
     */
    public function getOp()
    {
        return $this->op;
    }
}
