<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JeuxVideo
 *
 * @ORM\Table(name="jeux_video", indexes={@ORM\Index(name="ID", columns={"ID"})})
 * @ORM\Entity
 */
class JeuxVideo
{
    /**
     * @var int
     *
     * @ORM\Column(name="uid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;

    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="possesseur", type="string", length=255, nullable=false)
     */
    private $possesseur;

    /**
     * @var string
     *
     * @ORM\Column(name="console", type="string", length=255, nullable=false)
     */
    private $console;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_joueurs_max", type="integer", nullable=false)
     */
    private $nbreJoueursMax;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="text", length=65535, nullable=false)
     */
    private $commentaires;


}
