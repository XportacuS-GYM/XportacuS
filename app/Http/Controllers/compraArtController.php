<?php

namespace App\Http\Controllers;

use App\Models\Clases\compraArt;
use App\Models\Clases\DatosBancarios;
use Illuminate\Http\Request;

class compraArtController extends Controller
{

    private compraArt $compraArt;

    public function __construct()
    {
        $this->compraArt = new compraArt;
    }
    
    public function setArticulos(Request $request)
    {
        //$email = $request->email;
        $Articulos = $request->Articulos;
        $numeroTarjeta = $request->numeroTarjeta;
        $fechaCaducidad = $request->fechaCaducidad;
        $CVV = $request->CVV;
        $titular = $request->titular;

        $datosB = new DatosBancarios;
        $datosB->RegistrarDatos($numeroTarjeta, $fechaCaducidad, $CVV, $titular);

        $this->compraArt->setArticulos($Articulos);

        $this->compraArt->creaVenta();

        $respuesta = $this->compraArt->validaPago($datosB);

        if($respuesta == true){
            $this->compraArt->insertaVenta();
        }

    }
}
