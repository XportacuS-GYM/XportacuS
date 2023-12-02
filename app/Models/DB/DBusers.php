<?php

namespace App\Models\DB;

use App\Models\Clases\DatosBancarios;
use App\Models\Clases\suscriptor;
use Illuminate\Support\Facades\DB;

class DBusers
{
    public function getAllUsers(){

        $users = DB::select('select * from users');
        return $users;
    }


    public function getUserQR(String $email){

        $users = DB::select('select*from users where email = ?',[$email]);

        foreach ($users as $user){
            $usuario = new suscriptor(
                $user->name,
                $user->lastname,
                $user->email,
                $user->address,
                $user->age,
                $user->statusSubscription,
                $user->subscriptionDate
            );
        }

        $info = [
            'name' => $usuario->getName(),
            'lastname' => $usuario->getLastname(),
            'email' => $usuario->getEmail(),
            'addess' => $usuario->getAddres(),
            'age' => $usuario->getAge(),
            'statusSubscription' => $usuario->getStatusSubscription(),
            'subscriptionDate' => $usuario->getSubscriptionDate()
        ];


        return $info;
    }

    public function registroDatosB(DatosBancarios $datosB)
    {
        
    }

    public function ActualizaDatos($email)
    {
        DB::update('update users set statusSubscription = "activo" where email = ?',[$email]);
    }
}

