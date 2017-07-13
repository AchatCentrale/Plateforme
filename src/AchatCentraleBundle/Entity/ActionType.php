<?php

namespace AchatCentraleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionType
 *
 * @ORM\Table(name="ACTION_TYPE")
 * @ORM\Entity
 */
class ActionType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="AC_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acId;

    /**
     * @var string
     *
     * @ORM\Column(name="AC_NOM", type="string", length=100, nullable=true)
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
