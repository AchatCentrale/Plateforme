<?php

namespace AchatCentrale\CrmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientsNotes
 *
 * @ORM\Table(name="CLIENTS_NOTES", indexes={@ORM\Index(name="IDX_F77855983F592A49", columns={"CL_ID"})})
 * @ORM\Entity
 */
class ClientsNotes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CN_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cnId;

    /**
     * @var string
     *
     * @ORM\Column(name="CN_NOTE", type="string", length=500, nullable=true)
     */
    private $cnNote;

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
     * @var \DateTime
     *
     * @ORM\Column(name="MAJ_DATE", type="datetime", nullable=true)
     */
    private $majDate;

    /**
     * @var string
     *
     * @ORM\Column(name="MAJ_USER", type="string", length=100, nullable=true)
     */
    private $majUser;

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
