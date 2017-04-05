<?php

namespace AchatCentrale\CrmBundle\Entity;

/**
 * PanierTemp
 */
class PanierTemp
{
    /**
     * @var integer
     */
    private $ptId;

    /**
     * @var integer
     */
    private $clId;

    /**
     * @var integer
     */
    private $ccId;

    /**
     * @var integer
     */
    private $foId;

    /**
     * @var integer
     */
    private $prId;

    /**
     * @var integer
     */
    private $meId = '0';

    /**
     * @var \DateTime
     */
    private $ptDate;

    /**
     * @var integer
     */
    private $ptQte = '0';

    /**
     * @var string
     */
    private $ptDetail;

    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
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
