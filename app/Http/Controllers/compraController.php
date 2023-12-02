<?php

namespace App\Http\Controllers;

use App\Models\Clases\Compra;
use Illuminate\Http\Request;

class compraController extends Controller
{
    
    public function inicioCompra(Request $request){

        $numeroTarjeta = $request->numeroTarjeta;
        $fechaCaducidad = $request->fechaCaducidad;
        $CVV = $request->CVV;
        $titular = $request->titular;

        $compra = new Compra;

        $compra->iniciarCompra();
        $compra->DatosBancarios($numeroTarjeta, $fechaCaducidad, $CVV, $titular);
        $respuesta = $compra->DatosBancariosUsuario();

        if($respuesta == true){
            $compra->activaMembresia();
        }
        
    }
}
