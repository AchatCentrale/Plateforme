<?php

namespace PfplBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="Categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CatID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catid;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var integer
     *
     * @ORM\Column(name="CatIDParent", type="integer", nullable=true)
     */
    private $catidparent;

    /**
     * @var string
     *
     * @ORM\Column(name="CatDescription", type="string", length=100, nullable=true)
     */
    private $catdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="CatTitre", type="string", length=100, nullable=true)
     */
    private $cattitre;

    /**
     * @var string
     *
     * @ORM\Column(name="CatTitreReq", type="string", length=100, nullable=true)
     */
    private $cattitrereq;

    /**
     * @var string
     *
     * @ORM\Column(name="CatLien", type="string", length=300, nullable=true)
     */
    private $catlien;

    /**
     * @var string
     *
     * @ORM\Column(name="CatLienRW", type="string", length=100, nullable=true)
     */
    private $catlienrw;

    /**
     * @var string
     *
     * @ORM\Column(name="CatTagDescr", type="string", length=200, nullable=true)
     */
    private $cattagdescr;

    /**
     * @var string
     *
     * @ORM\Column(name="CatTagKeyword", type="string", length=1000, nullable=true)
     */
    private $cattagkeyword;

    /**
     * @var string
     *
     * @ORM\Column(name="CatImage", type="string", length=100, nullable=true)
     */
    private $catimage;

    /**
     * @var string
     *
     * @ORM\Column(name="CatImage_H", type="string", length=100, nullable=true)
     */
    private $catimageH;

    /**
     * @var string
     *
     * @ORM\Column(name="CatBandeau", type="string", length=100, nullable=true)
     */
    private $catbandeau;

    /**
     * @var integer
     *
     * @ORM\Column(name="CatSort", type="integer", nullable=true)
     */
    private $catsort;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CatDate", type="datetime", nullable=true)
     */
    private $catdate;



    /**
     * Get catid
     *
     * @return integer
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Categories
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
     * Set catidparent
     *
     * @param integer $catidparent
     *
     * @return Categories
     */
    public function setCatidparent($catidparent)
    {
        $this->catidparent = $catidparent;

        return $this;
    }

    /**
     * Get catidparent
     *
     * @return integer
     */
    public function getCatidparent()
    {
        return $this->catidparent;
    }

    /**
     * Set catdescription
     *
     * @param string $catdescription
     *
     * @return Categories
     */
    public function setCatdescription($catdescription)
    {
        $this->catdescription = $catdescription;

        return $this;
    }

    /**
     * Get catdescription
     *
     * @return string
     */
    public function getCatdescription()
    {
        return $this->catdescription;
    }

    /**
     * Set cattitre
     *
     * @param string $cattitre
     *
     * @return Categories
     */
    public function setCattitre($cattitre)
    {
        $this->cattitre = $cattitre;

        return $this;
    }

    /**
     * Get cattitre
     *
     * @return string
     */
    public function getCattitre()
    {
        return $this->cattitre;
    }

    /**
     * Set cattitrereq
     *
     * @param string $cattitrereq
     *
     * @return Categories
     */
    public function setCattitrereq($cattitrereq)
    {
        $this->cattitrereq = $cattitrereq;

        return $this;
    }

    /**
     * Get cattitrereq
     *
     * @return string
     */
    public function getCattitrereq()
    {
        return $this->cattitrereq;
    }

    /**
     * Set catlien
     *
     * @param string $catlien
     *
     * @return Categories
     */
    public function setCatlien($catlien)
    {
        $this->catlien = $catlien;

        return $this;
    }

    /**
     * Get catlien
     *
     * @return string
     */
    public function getCatlien()
    {
        return $this->catlien;
    }

    /**
     * Set catlienrw
     *
     * @param string $catlienrw
     *
     * @return Categories
     */
    public function setCatlienrw($catlienrw)
    {
        $this->catlienrw = $catlienrw;

        return $this;
    }

    /**
     * Get catlienrw
     *
     * @return string
     */
    public function getCatlienrw()
    {
        return $this->catlienrw;
    }

    /**
     * Set cattagdescr
     *
     * @param string $cattagdescr
     *
     * @return Categories
     */
    public function setCattagdescr($cattagdescr)
    {
        $this->cattagdescr = $cattagdescr;

        return $this;
    }

    /**
     * Get cattagdescr
     *
     * @return string
     */
    public function getCattagdescr()
    {
        return $this->cattagdescr;
    }

    /**
     * Set cattagkeyword
     *
     * @param string $cattagkeyword
     *
     * @return Categories
     */
    public function setCattagkeyword($cattagkeyword)
    {
        $this->cattagkeyword = $cattagkeyword;

        return $this;
    }

    /**
     * Get cattagkeyword
     *
     * @return string
     */
    public function getCattagkeyword()
    {
        return $this->cattagkeyword;
    }

    /**
     * Set catimage
     *
     * @param string $catimage
     *
     * @return Categories
     */
    public function setCatimage($catimage)
    {
        $this->catimage = $catimage;

        return $this;
    }

    /**
     * Get catimage
     *
     * @return string
     */
    public function getCatimage()
    {
        return $this->catimage;
    }

    /**
     * Set catimageH
     *
     * @param string $catimageH
     *
     * @return Categories
     */
    public function setCatimageH($catimageH)
    {
        $this->catimageH = $catimageH;

        return $this;
    }

    /**
     * Get catimageH
     *
     * @return string
     */
    public function getCatimageH()
    {
        return $this->catimageH;
    }

    /**
     * Set catbandeau
     *
     * @param string $catbandeau
     *
     * @return Categories
     */
    public function setCatbandeau($catbandeau)
    {
        $this->catbandeau = $catbandeau;

        return $this;
    }

    /**
     * Get catbandeau
     *
     * @return string
     */
    public function getCatbandeau()
    {
        return $this->catbandeau;
    }

    /**
     * Set catsort
     *
     * @param integer $catsort
     *
     * @return Categories
     */
    public function setCatsort($catsort)
    {
        $this->catsort = $catsort;

        return $this;
    }

    /**
     * Get catsort
     *
     * @return integer
     */
    public function getCatsort()
    {
        return $this->catsort;
    }

    /**
     * Set catdate
     *
     * @param \DateTime $catdate
     *
     * @return Categories
     */
    public function setCatdate($catdate)
    {
        $this->catdate = $catdate;

        return $this;
    }

    /**
     * Get catdate
     *
     * @return \DateTime
     */
    public function getCatdate()
    {
        return $this->catdate;
    }
}
