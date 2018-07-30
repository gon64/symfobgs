<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Propuesta;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandaRepository")
 */
class Demanda extends Propuesta
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
    private $precio_desde;

    /**
     * @ORM\Column(type="float")
     */
    private $precio_hasta;

    public function getId()
    {
        return $this->id;
    }

    public function getPrecioDesde(): ?float
    {
        return $this->precio_desde;
    }

    public function setPrecioDesde(float $precio_desde): self
    {
        $this->precio_desde = $precio_desde;

        return $this;
    }

    public function getPrecioHasta(): ?float
    {
        return $this->precio_hasta;
    }

    public function setPrecioHasta(float $precio_hasta): self
    {
        $this->precio_hasta = $precio_hasta;

        return $this;
    }
}
