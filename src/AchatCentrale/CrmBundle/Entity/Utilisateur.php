<?php

namespace AchatCentrale\CrmBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AchatCentrale\CrmBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{


    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
