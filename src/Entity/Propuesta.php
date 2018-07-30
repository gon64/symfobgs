<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropuestaRepository")
 */
abstract class Propuesta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Juego", inversedBy="propuestas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $juego;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\Column(type="string", length=2550, nullable=true)
     */
    private $comentario;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ubicacion_gps;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratio_gps;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuario", inversedBy="propuestas", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId()
    {
        return $this->id;
    }

    public function getJuego(): ?Juego
    {
        return $this->juego;
    }

    public function setJuego(?Juego $juego): self
    {
        $this->juego = $juego;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getUbicacionGps(): ?string
    {
        return $this->ubicacion_gps;
    }

    public function setUbicacionGps(?string $ubicacion_gps): self
    {
        $this->ubicacion_gps = $ubicacion_gps;

        return $this;
    }

    public function getRatioGps(): ?int
    {
        return $this->ratio_gps;
    }

    public function setRatioGps(?int $ratio_gps): self
    {
        $this->ratio_gps = $ratio_gps;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
