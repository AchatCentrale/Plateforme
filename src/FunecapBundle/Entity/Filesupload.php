<?php

namespace FunecapBundle\Entity;

/**
 * Filesupload
 */
class Filesupload
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fichier;

    /**
     * @var integer
     */
    private $taille;

    /**
     * @var integer
     */
    private $taillex;

    /**
     * @var integer
     */
    private $tailley;

    /**
     * @var string
     */
    private $commentaires;

    /**
     * @var integer
     */
    private $docid;

    /**
     * @var \DateTime
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

