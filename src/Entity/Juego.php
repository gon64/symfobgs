<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JuegoRepository")
 */
class Juego
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_bgg;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_portada;


    public function __construct()
    {
        $this->propuestas = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdBgg(): ?int
    {
        return $this->id_bgg;
    }

    public function setIdBgg(int $id_bgg): self
    {
        $this->id_bgg = $id_bgg;

        return $this;
    }

    public function getUrlPortada(): ?string
    {
        return $this->url_portada;
    }

    public function setUrlPortada(?string $url_portada): self
    {
        $this->url_portada = $url_portada;

        return $this;
    }

}
