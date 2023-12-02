<?php

namespace App\Models\Clases;

class DatosBancarios{
    private String $titular, $fechaCaducidad;
    private int $numeroTarjeta, $CVV;

    public function __construct()
    {
        
    }

    public function RegistrarDatos(int $numeroTarjeta, String $fechaCaducidad, int $CVV, String $titular)
    {
        $this->numeroTarjeta = $numeroTarjeta;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->CVV = $CVV;
        $this->titular = $titular;
    }

    public function getTitular() {
        return $this->titular;
    }

    public function setTitular($titular) {
        $this->titular = $titular;
    }

    public function getFechaCaducidad() {
        return $this->fechaCaducidad;
    }

    public function setFechaCaducidad($fechaCaducidad) {
        $this->fechaCaducidad = $fechaCaducidad;
    }

    public function getNumeroTarjeta() {
        return $this->numeroTarjeta;
    }

    public function setNumeroTarjeta($numeroTarjeta) {
        $this->numeroTarjeta = $numeroTarjeta;
    }

    public function getCVV() {
        return $this->CVV;
    }

    public function setCVV($CVV) {
        $this->CVV = $CVV;
    }

    public function inicioVerificacion()
    {
        $banco = new Banco;
        $respuesta = $banco->Asociar($this->numeroTarjeta);
        return $respuesta;
    }

}