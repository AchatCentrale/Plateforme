<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitsPromo
 *
 * @ORM\Table(name="PRODUITS_PROMO")
 * @ORM\Entity
 */
class ProduitsPromo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer", nullable=true)
     */
    private $prId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PP_ORDRE", type="integer", nullable=true)
     */
    private $ppOrdre = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PP_DATE", type="datetime", nullable=true)
     */
    private $ppDate;

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
     * Get ppId
     *
     * @return integer
     */
    public function getPpId()
    {
        return $this->ppId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return ProduitsPromo
     */
    public function setSoId($soId)
    {
        $this->soId = $soId;

        return $this;
    }

    /**
     * Get soId
     *
     * @return integer
     */
    public function getSoId()
    {
        return $this->soId;
    }

    /**
     * Set prId
     *
     * @param integer $prId
     *
     * @return ProduitsPromo
     */
    public function setPrId($prId)
    {
        $this->prId = $prId;

        return $this;
    }

    /**
     * Get prId
     *
     * @return integer
     */
    public function getPrId()
    {
        return $this->prId;
    }

    /**
     * Set ppOrdre
     *
     * @param integer $ppOrdre
     *
     * @return ProduitsPromo
     */
    public function setPpOrdre($ppOrdre)
    {
        $this->ppOrdre = $ppOrdre;

        return $this;
    }

    /**
     * Get ppOrdre
     *
     * @return integer
     */
    public function getPpOrdre()
    {
        return $this->ppOrdre;
    }

    /**
     * Set ppDate
     *
     * @param \DateTime $ppDate
     *
     * @return ProduitsPromo
     */
    public function setPpDate($ppDate)
    {
        $this->ppDate = $ppDate;

        return $this;
    }

    /**
     * Get ppDate
     *
     * @return \DateTime
     */
    public function getPpDate()
    {
        return $this->ppDate;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ProduitsPromo
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
     * @return ProduitsPromo
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
}
