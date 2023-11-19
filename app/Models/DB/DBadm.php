<?php

namespace App\Models\DB;

use Illuminate\Support\Facades\DB;

class DBadm{

    public function validaClave(int $clave){
        $response = DB::select('select count(*) from gymPasswords where gymPass = ? and gymPassType = "ADM"', [$clave]);
        return $response;
    }

    public function validaClaveSuper(int $superClave){
        $response = DB::select('select count(*) from gymPasswords where gymPass = ? and gymPassType = "supADM"', [$superClave]);
        return $response;
    }
}