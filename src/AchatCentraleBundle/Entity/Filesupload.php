<?php

namespace AchatCentraleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filesupload
 *
 * @ORM\Table(name="FilesUpload")
 * @ORM\Entity
 */
class Filesupload
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Fichier", type="string", length=200, nullable=false)
     */
    private $fichier;

    /**
     * @var integer
     *
     * @ORM\Column(name="Taille", type="integer", nullable=false)
     */
    private $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="TailleX", type="integer", nullable=true)
     */
    private $taillex;

    /**
     * @var integer
     *
     * @ORM\Column(name="TailleY", type="integer", nullable=true)
     */
    private $tailley;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaires", type="string", length=500, nullable=true)
     */
    private $commentaires;

    /**
     * @var integer
     *
     * @ORM\Column(name="DocID", type="integer", nullable=true)
     */
    private $docid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateUpload", type="datetime", nullable=true)
     */
    private $dateupload;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Filesupload
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Filesupload
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set taillex
     *
     * @param integer $taillex
     *
     * @return Filesupload
     */
    public function setTaillex($taillex)
    {
        $this->taillex = $taillex;

        return $this;
    }

    /**
     * Get taillex
     *
     * @return integer
     */
    public function getTaillex()
    {
        return $this->taillex;
    }

    /**
     * Set tailley
     *
     * @param integer $tailley
     *
     * @return Filesupload
     */
    public function setTailley($tailley)
    {
        $this->tailley = $tailley;

        return $this;
    }

    /**
     * Get tailley
     *
     * @return integer
     */
    public function getTailley()
    {
        return $this->tailley;
    }

    /**
     * Set commentaires
     *
     * @param string $commentaires
     *
     * @return Filesupload
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return string
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set docid
     *
     * @param integer $docid
     *
     * @return Filesupload
     */
    public function setDocid($docid)
    {
        $this->docid = $docid;

        return $this;
    }

    /**
     * Get docid
     *
     * @return integer
     */
    public function getDocid()
    {
        return $this->docid;
    }

    /**
     * Set dateupload
     *
     * @param \DateTime $dateupload
     *
     * @return Filesupload
     */
    public function setDateupload($dateupload)
    {
        $this->dateupload = $dateupload;

        return $this;
    }

    /**
     * Get dateupload
     *
     * @return \DateTime
     */
    public function getDateupload()
    {
        return $this->dateupload;
    }
}
