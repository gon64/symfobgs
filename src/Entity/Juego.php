<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     */
    private $url_portada;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearpublished;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minplayers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxplayers;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $playingtime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    

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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getYearpublished(): ?int
    {
        return $this->yearpublished;
    }

    public function setYearpublished(?int $yearpublished): self
    {
        $this->yearpublished = $yearpublished;

        return $this;
    }

    public function getMinplayers(): ?int
    {
        return $this->minplayers;
    }

    public function setMinplayers(?int $minplayers): self
    {
        $this->minplayers = $minplayers;

        return $this;
    }

    public function getMaxplayers(): ?int
    {
        return $this->maxplayers;
    }

    public function setMaxplayers(?int $maxplayers): self
    {
        $this->maxplayers = $maxplayers;

        return $this;
    }

    public function getPlayingtime(): ?int
    {
        return $this->playingtime;
    }

    public function setPlayingtime(?int $playingtime): self
    {
        $this->playingtime = $playingtime;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
