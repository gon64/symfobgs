<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_usuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clave;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ubicacion_gps;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Propuesta", mappedBy="usuario", cascade={"persist", "remove"})
     */
    private $propuestas;

    public function getId()
    {
        return $this->id;
    }

    public function getNombreUsuario(): ?string
    {
        return $this->nombre_usuario;
    }

    public function setNombreUsuario(string $nombre_usuario): self
    {
        $this->nombre_usuario = $nombre_usuario;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

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

    public function getPropuestas(): ?Propuesta
    {
        return $this->propuestas;
    }

    public function setPropuestas(Propuesta $propuestas): self
    {
        $this->propuestas = $propuestas;

        // set the owning side of the relation if necessary
        if ($this !== $propuestas->getUsuario()) {
            $propuestas->setUsuario($this);
        }

        return $this;
    }
}
