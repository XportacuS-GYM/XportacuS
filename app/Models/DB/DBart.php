<?php

namespace App\Models\DB;

use App\Models\Clases\articulo;
use App\Models\Clases\venta;
use Illuminate\Support\Facades\DB;
class DBart{

    public function traerArticulos($idArticulos)
    {
        $articulos = DB::select('select*from articulos where idArticulo in (' . implode(',', $idArticulos) . ')');

        foreach ($articulos as $articulo){
            $articuloOBT = new articulo(
                $articulo->idArticulo,
                $articulo->nombreArticulo,
                $articulo->precioArticulo,
                $articulo->cantidadArticulo,
                $articulo->familiaArticulo
            );

            $arrayArticulos[] = $articuloOBT;
        }

        return $arrayArticulos;   
    }

    public function insertarVenta(venta $venta)
    {
        $lineasDventa = $venta->getLineaVenta();

        DB::statement('START TRANSACTION');

        DB::statement('INSERT INTO ventas(idVenta, totalVenta) VALUES (0, ?)', [$venta->getTotalVenta()]);
        $idVenta = DB::selectOne('SELECT LAST_INSERT_ID() as id')->id;

        foreach ($lineasDventa as $lineaVenta) {
            $articulo = $lineaVenta->getArticulo();

            DB::statement(
                'INSERT INTO lineaVentas(idLineaVenta, idArticulo, idVenta, cantidad, precio) VALUES (0, ?, ?, ?, ?)',
                [$articulo->getIdArticulo(), $idVenta, $articulo->getCantidadArticulo(), $articulo->getPrecioArticulo()]
            );
        }

        DB::statement('COMMIT');
    }
}