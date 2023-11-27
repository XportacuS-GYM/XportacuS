<?php

namespace App\Http\Controllers;

use App\Models\DB\DBadm;
use App\Models\DB\DBusers;
use Illuminate\Http\Request;

class AdmController extends Controller
{

    private DBusers $dbUsers;
    private DBadm $dbAdm;

    public function __construct()
    {
        $this->dbUsers = new DBusers;
        $this->dbAdm = new DBadm;
    }

    public function enviaClave(Request $request){

        $clave = $request->clave;
        $respuesta = $this->dbAdm->validaClave($clave);
        
        return $respuesta;
    }

    public function enviaSuperClave(Request $request){
        $superClave = $request->clave;
        $respuesta = $this->dbAdm->validaClaveSuper($superClave);

        return $respuesta;
    }

    public function obtenerUsuario(Request $request){
        $email = $request->email;

        $usuario = $this->dbUsers->getUserQR($email);

        return $usuario;
    }

}
