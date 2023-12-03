<?php

namespace App\Models\Clases;

class Banco{

    private int $saldo;

    public function __construct()
    {
        $this->saldo = 2000;
    }

    public function Asociar($numeroTarjeta)
    {
        return true;
    }

    public function AsociarTienda($numeroTarjeta, $total)
    {
        $bandera = true;
        if($total > $this->saldo){
            $bandera = false;
        }

        return $bandera;
    }
}