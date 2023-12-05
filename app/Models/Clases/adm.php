<?php

namespace App\Models\Clases;

use App\Models\DB\DBusers;

class adm{

    private DBusers $db;

    public function __construct()
    {
        $this->db = new DBusers;
    }


    public function SolicitarListaSuscriptores(){
        $users = $this->db->getAllUsers();

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

        $arrayUsuarios [] = [
            'name' => $usuario->getName(),
            'lastname' => $usuario->getLastname(),
            'email' => $usuario->getEmail(),
            'addess' => $usuario->getAddres(),
            'age' => $usuario->getAge(),
            'statusSubscription' => $usuario->getStatusSubscription(),
            'subscriptionDate' => $usuario->getSubscriptionDate()
        ];

        return $arrayUsuarios;
    }

}