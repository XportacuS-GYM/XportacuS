<?php

namespace App\Models\Clases;


class venta{
    private int $idVenta, $totalVenta;
    private array $lineaVenta;

    public function __construct()
    {

    }

    public function getIdVenta()
    {
        return $this->idVenta;
    }

    public function setIdVenta(int $idVenta)
    {
        $this->idVenta = $idVenta;
    }

    public function getLineaVenta()
    {
        return $this->lineaVenta;
    }

    public function setLineaVenta(array $lineaVenta)
    {
        $this->lineaVenta = $lineaVenta;
    }

    public function getTotalVenta()
    {
        return $this->totalVenta;
    }

    public function setTotalVenta(int $totalVenta)
    {
        $this->totalVenta = $totalVenta;
    }

    public function agregaLineaVenta(lineaVenta $linea)
    {
        $this->lineaVenta[] = $linea;
    }

}