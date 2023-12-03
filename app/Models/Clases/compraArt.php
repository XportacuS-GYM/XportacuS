<?php

namespace App\Models\Clases;

use App\Models\DB\DBart;

class compraArt{


    private DBart $db;
    private $articulos;
    private venta $venta;
    private Banco $banco;

    public function __construct()
    {
        $this->db = new DBart;
        $this->banco = new Banco;
    }

    public function setArticulos($idArticulos)
    {
        $this->articulos = $this->db->traerArticulos($idArticulos);
    }

    public function creaVenta()
    {
        $this->venta = new venta;
        $total = 0;
        foreach ($this->articulos as $articulo){
            $lineaVenta = new lineaVenta($articulo, $articulo->getCantidadArticulo(), $articulo->getPrecioArticulo());

            $this->venta->agregaLineaVenta($lineaVenta);
            $total = $total+$articulo->getPrecioArticulo();
        }

        $this->venta->setTotalVenta($total);
    }


    public function validaPago(DatosBancarios $datosB)
    {
         $numeroTarjeta = $datosB->getNumeroTarjeta();
         $total = $this->venta->getTotalVenta();
         $respuesta = $this->banco->AsociarTienda($numeroTarjeta, $total);

         return $respuesta;
    }

    public function insertaVenta()
    {
        $this->db->insertarVenta($this->venta);
    }
    
}