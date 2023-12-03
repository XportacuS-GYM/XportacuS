<?php

namespace App\Models\Clases;


class lineaVenta{
    private int $idLineaVenta, $cantidad, $precio;
    private articulo $articulo;

    public function __construct(articulo $articulo, int $cantidad, int $precio)
    {
        $this->articulo = $articulo;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
    }

    public function getIdLineaVenta()
    {
        return $this->idLineaVenta;
    }

    public function setIdLineaVenta(int $idLineaVenta)
    {
        $this->idLineaVenta = $idLineaVenta;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio(int $precio)
    {
        $this->precio = $precio;
    }

    public function getArticulo()
    {
        return $this->articulo;
    }

    public function setArticulo(articulo $articulo)
    {
        $this->articulo = $articulo;
    }

}