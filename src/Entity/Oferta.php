<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfertaRepository")
 */
class Oferta
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $ubicacion;


    /**
     * @ORM\Column(type="string", length=1255, nullable=true)
     */
    private $comentario;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_creacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Juego", inversedBy="ofertas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $juego;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="ofertas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="smallint")
     */
    private $game_status;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sleeve_status;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=16, nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=16, nullable=true)
     */
    private $lon;

    /**
     * @ORM\Column(type="integer")
     */
    private $languages;

    public function __construct()
    {
        $this->fecha_creacion = new DateTime(); 
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

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

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): self
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
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

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getGameStatus(): ?int
    {
        return $this->game_status;
    }

    public function setGameStatus(int $game_status): self
    {
        $this->game_status = $game_status;

        return $this;
    }

    public function getSleeveStatus(): ?int
    {
        return $this->sleeve_status;
    }

    public function setSleeveStatus(int $sleeve_status): self
    {
        $this->sleeve_status = $sleeve_status;

        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon()
    {
        return $this->lon;
    }

    public function setLon($lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getLanguages(): ?int
    {
        return $this->languages;
    }

    public function setLanguages(int $languages): self
    {
        $this->languages = $languages;

        return $this;
    }

    public function hasLanguage(int $language){
        return $this->languages & $language;
    }
}
