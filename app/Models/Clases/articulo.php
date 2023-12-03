<?php

namespace App\Models\Clases;


class articulo {
    private int $idArticulo, $precioArticulo, $cantidadArticulo;
    private String $nombreArticulo, $familiaArticulo;

    public function __construct(int $idArticulo, String $nombreArticulo, int $precioArticulo, int $cantidadArticulo, String $familiaArticulo)
    {
        $this->idArticulo = $idArticulo;
        $this->nombreArticulo = $nombreArticulo;
        $this->precioArticulo = $precioArticulo;
        $this->cantidadArticulo = $cantidadArticulo;
        $this->familiaArticulo = $familiaArticulo;
    }

    public function getIdArticulo()
    {
        return $this->idArticulo;
    }

    public function setIdArticulo(int $idArticulo)
    {
        $this->idArticulo = $idArticulo;
    }

    public function getNombreArticulo()
    {
        return $this->nombreArticulo;
    }

    public function setNombreArticulo(string $nombreArticulo)
    {
        $this->nombreArticulo = $nombreArticulo;
    }

    public function getPrecioArticulo()
    {
        return $this->precioArticulo;
    }

    public function setPrecioArticulo(int $precioArticulo)
    {
        $this->precioArticulo = $precioArticulo;
    }

    public function getCantidadArticulo()
    {
        return $this->cantidadArticulo;
    }

    public function setCantidadArticulo(int $cantidadArticulo)
    {
        $this->cantidadArticulo = $cantidadArticulo;
    }

    public function getFamiliaArticulo()
    {
        return $this->familiaArticulo;
    }

    public function setFamiliaArticulo(string $familiaArticulo)
    {
        $this->familiaArticulo = $familiaArticulo;
    }

}