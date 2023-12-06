<?php

namespace App\Http\Controllers;

use App\Models\Clases\Compra;
use Illuminate\Http\Request;

class compraController extends Controller
{
    
    public function inicioCompra(Request $request){

        $numeroTarjeta = 00000000000;
        $fechaCaducidad = '00-00-0000';
        $CVV = 111;
        $titular = 'Usuario anonimo';

        $compra = new Compra;

        $compra->iniciarCompra();
        $compra->DatosBancarios($numeroTarjeta, $fechaCaducidad, $CVV, $titular);
        $respuesta = $compra->DatosBancariosUsuario();

        if($respuesta == true){
            $compra->activaMembresia();
        }
        
    }
}
