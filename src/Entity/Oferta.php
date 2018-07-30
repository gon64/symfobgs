<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Propuesta;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfertaRepository")
 */
class Oferta extends Propuesta
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
    private $precio_venta;

    public function getId()
    {
        return $this->id;
    }

    public function getPrecioVenta(): ?float
    {
        return $this->precio_venta;
    }

    public function setPrecioVenta(floar $precio_venta): self
    {
        $this->precio_venta = $precio_venta;

        return $this;
    }
}
