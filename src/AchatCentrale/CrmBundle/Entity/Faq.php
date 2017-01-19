<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faq
 *
 * @ORM\Table(name="FAQ")
 * @ORM\Entity
 */
class Faq
{
    /**
     * @var integer
     *
     * @ORM\Column(name="QF_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $qfId;

    /**
     * @var integer
     *
     * @ORM\Column(name="SO_ID", type="integer", nullable=true)
     */
    private $soId;

    /**
     * @var string
     *
     * @ORM\Column(name="QF_QUESTION", type="string", length=500, nullable=true)
     */
    private $qfQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="QF_REPONSE", type="text", length=16, nullable=true)
     */
    private $qfReponse;

    /**
     * @var integer
     *
     * @ORM\Column(name="QF_ORDRE", type="integer", nullable=true)
     */
    private $qfOrdre = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="QF_DATE", type="datetime", nullable=true)
     */
    private $qfDate;



    /**
     * Get qfId
     *
     * @return integer
     */
    public function getQfId()
    {
        return $this->qfId;
    }

    /**
     * Set soId
     *
     * @param integer $soId
     *
     * @return Faq
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
     * Set qfQuestion
     *
     * @param string $qfQuestion
     *
     * @return Faq
     */
    public function setQfQuestion($qfQuestion)
    {
        $this->qfQuestion = $qfQuestion;

        return $this;
    }

    /**
     * Get qfQuestion
     *
     * @return string
     */
    public function getQfQuestion()
    {
        return $this->qfQuestion;
    }

    /**
     * Set qfReponse
     *
     * @param string $qfReponse
     *
     * @return Faq
     */
    public function setQfReponse($qfReponse)
    {
        $this->qfReponse = $qfReponse;

        return $this;
    }

    /**
     * Get qfReponse
     *
     * @return string
     */
    public function getQfReponse()
    {
        return $this->qfReponse;
    }

    /**
     * Set qfOrdre
     *
     * @param integer $qfOrdre
     *
     * @return Faq
     */
    public function setQfOrdre($qfOrdre)
    {
        $this->qfOrdre = $qfOrdre;

        return $this;
    }

    /**
     * Get qfOrdre
     *
     * @return integer
     */
    public function getQfOrdre()
    {
        return $this->qfOrdre;
    }

    /**
     * Set qfDate
     *
     * @param \DateTime $qfDate
     *
     * @return Faq
     */
    public function setQfDate($qfDate)
    {
        $this->qfDate = $qfDate;

        return $this;
    }

    /**
     * Get qfDate
     *
     * @return \DateTime
     */
    public function getQfDate()
    {
        return $this->qfDate;
    }
}
