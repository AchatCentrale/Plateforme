<?php

namespace FunecapBundle\Entity;

/**
 * ActionType
 */
class ActionType
{
    /**
     * @var integer
     */
    private $acId;

    /**
     * @var string
     */
    private $acNom;


    /**
     * Get acId
     *
     * @return integer
     */
    public function getAcId()
    {
        return $this->acId;
    }

    /**
     * Set acNom
     *
     * @param string $acNom
     *
     * @return ActionType
     */
    public function setAcNom($acNom)
    {
        $this->acNom = $acNom;

        return $this;
    }

    /**
     * Get acNom
     *
     * @return string
     */
    public function getAcNom()
    {
        return $this->acNom;
    }
}

