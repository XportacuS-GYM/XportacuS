<?php

namespace App\Http\Controllers;

use App\Models\Clases\adm;
use App\Models\DB\DBadm;
use App\Models\DB\DBusers;
use Illuminate\Http\Request;

class AdmController extends Controller
{

    private DBusers $dbUsers;
    private DBadm $dbAdm;
    private adm $adm;

    public function __construct()
    {
        $this->dbUsers = new DBusers;
        $this->dbAdm = new DBadm;
        $this->adm = new adm;
    }

    public function SolicitarListaSuscriptores()
    {
        $usuarios = $this->adm->SolicitarListaSuscriptores();
        return $usuarios;
    }

    public function obtenerUsuario(Request $request){
        $email = $request->email;

        $usuario = $this->dbUsers->getUserQR($email);

        return $usuario;
    }

}
