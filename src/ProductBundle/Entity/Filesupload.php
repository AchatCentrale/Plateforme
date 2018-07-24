<?php

namespace ProductBundle\Entity;

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


}

