<?php

namespace AchatCentrale\CrmBundle\Entity;

/**
 * ClientsNotes
 */
class ClientsNotes
{



    /**
     * @var integer
     */
    private $cnId;

    /**
     * @var string
     */
    private $cnNote;

    /**
     * @var \DateTime
     */
    private $insDate;

    /**
     * @var string
     */
    private $insUser;

    /**
     * @var \DateTime
     */
    private $majDate;

    /**
     * @var string
     */
    private $majUser;

    /**
     * @var \AchatCentrale\CrmBundle\Entity\Clients
     */
    private $cl;

    /**
     * ClientsNotes constructor.
     */
    public function __construct()
    {
        $this->insDate = new \DateTime('now');

    }


    /**
     * Get cnId
     *
     * @return integer
     */
    public function getCnId()
    {
        return $this->cnId;
    }

    /**
     * Set cnNote
     *
     * @param string $cnNote
     *
     * @return ClientsNotes
     */
    public function setCnNote($cnNote)
    {
        $this->cnNote = $cnNote;

        return $this;
    }

    /**
     * Get cnNote
     *
     * @return string
     */
    public function getCnNote()
    {
        return $this->cnNote;
    }

    /**
     * Set insDate
     *
     * @param \DateTime $insDate
     *
     * @return ClientsNotes
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
     * @return ClientsNotes
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

    /**
     * Set majDate
     *
     * @param \DateTime $majDate
     *
     * @return ClientsNotes
     */
    public function setMajDate($majDate)
    {
        $this->majDate = $majDate;

        return $this;
    }

    /**
     * Get majDate
     *
     * @return \DateTime
     */
    public function getMajDate()
    {
        return $this->majDate;
    }

    /**
     * Set majUser
     *
     * @param string $majUser
     *
     * @return ClientsNotes
     */
    public function setMajUser($majUser)
    {
        $this->majUser = $majUser;

        return $this;
    }

    /**
     * Get majUser
     *
     * @return string
     */
    public function getMajUser()
    {
        return $this->majUser;
    }

    /**
     * Set cl
     *
     * @param \AchatCentrale\CrmBundle\Entity\Clients $cl
     *
     * @return ClientsNotes
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
}
