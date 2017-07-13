<?php

namespace AchatCentraleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PanierTemp
 *
 * @ORM\Table(name="PANIER_TEMP")
 * @ORM\Entity
 */
class PanierTemp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="PT_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ptId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CL_ID", type="integer", nullable=true)
     */
    private $clId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CC_ID", type="integer", nullable=true)
     */
    private $ccId;

    /**
     * @var integer
     *
     * @ORM\Column(name="FO_ID", type="integer", nullable=true)
     */
    private $foId;

    /**
     * @var integer
     *
     * @ORM\Column(name="PR_ID", type="integer", nullable=true)
     */
    private $prId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ME_ID", type="integer", nullable=true)
     */
    private $meId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="PT_DATE", type="date", nullable=true)
     */
    private $ptDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="PT_QTE", type="integer", nullable=true)
     */
    private $ptQte;

    /**
     * @var string
     *
     * @ORM\Column(name="PT_DETAIL", type="string", length=5, nullable=true)
     */
    private $ptDetail;

    /**
     * @var float
     *
     * @ORM\Column(name="PT_PRIX_VC", type="float", precision=53, scale=0, nullable=true)
     */
    private $ptPrixVc;

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
     * Get ptId
     *
     * @return integer
     */
    public function getPtId()
    {
        return $this->ptId;
    }

    /**
     * Set clId
     *
     * @param integer $clId
     *
     * @return PanierTemp
     */
    public function setClId($clId)
    {
        $this->clId = $clId;

        return $this;
    }

    /**
     * Get clId
     *
     * @return integer
     */
    public function getClId()
    {
        return $this->clId;
    }

    /**
     * Set ccId
     *
     * @param integer $ccId
     *
     * @return PanierTemp
     */
    public function setCcId($ccId)
    {
        $this->ccId = $ccId;

        return $this;
    }

    /**
     * Get ccId
     *
     * @return integer
     */
    public function getCcId()
    {
        return $this->ccId;
    }

    /**
     * Set foId
     *
     * @param integer $foId
     *
     * @return PanierTemp
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
     * Set prId
     *
     * @param integer $prId
     *
     * @return PanierTemp
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
     * Set meId
     *
     * @param integer $meId
     *
     * @return PanierTemp
     */
    public function setMeId($meId)
    {
        $this->meId = $meId;

        return $this;
    }

    /**
     * Get meId
     *
     * @return integer
     */
    public function getMeId()
    {
        return $this->meId;
    }

    /**
     * Set ptDate
     *
     * @param \DateTime $ptDate
     *
     * @return PanierTemp
     */
    public function setPtDate($ptDate)
    {
        $this->ptDate = $ptDate;

        return $this;
    }

    /**
     * Get ptDate
     *
     * @return \DateTime
     */
    public function getPtDate()
    {
        return $this->ptDate;
    }

    /**
     * Set ptQte
     *
     * @param integer $ptQte
     *
     * @return PanierTemp
     */
    public function setPtQte($ptQte)
    {
        $this->ptQte = $ptQte;

        return $this;
    }

    /**
     * Get ptQte
     *
     * @return integer
     */
    public function getPtQte()
    {
        return $this->ptQte;
    }

    /**
     * Set ptDetail
     *
     * @param string $ptDetail
     *
     * @return PanierTemp
     */
    public function setPtDetail($ptDetail)
    {
        $this->ptDetail = $ptDetail;

        return $this;
    }

    /**
     * Get ptDetail
     *
     * @return string
     */
    public function getPtDetail()
    {
        return $this->ptDetail;
    }

    /**
     * Set ptPrixVc
     *
     * @param float $ptPrixVc
     *
     * @return PanierTemp
     */
    public function setPtPrixVc($ptPrixVc)
    {
        $this->ptPrixVc = $ptPrixVc;

        return $this;
    }

    /**
     * Get ptPrixVc
     *
     * @return float
     */
    public function getPtPrixVc()
    {
        return $this->ptPrixVc;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return PanierTemp
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
     * @return PanierTemp
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
