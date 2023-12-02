<?php

namespace App\Models\Clases;

use Illuminate\Support\Facades\Auth;

class Compra{

    private DatosBancarios $datosB;

    public function __construct()
    {
        
    }

    public function iniciarCompra()
    {
        $this->datosB = new DatosBancarios;
    }

    public function DatosBancarios(int $numeroTarjeta, String $fechaCaducidad, int $CVV, String $titular)
    {
        $this->datosB->RegistrarDatos($numeroTarjeta, $fechaCaducidad, $CVV, $titular);
    }

    public function DatosBancariosUsuario()
    {
        $respuesta = $this->datosB->inicioVerificacion();
        return $respuesta;
    }

    public function activaMembresia()
    {
        $suscriptor = new suscriptor(Auth::user()->name, Auth::user()->lastname, Auth::user()->email, Auth::user()->address,
        Auth::user()->age, Auth::user()->statusSubscription, '');

        $suscriptor->setActivo('Activo');
        

    }
}