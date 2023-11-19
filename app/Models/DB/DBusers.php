<?php

namespace App\Models\DB;

use Illuminate\Support\Facades\DB;

class DBusers
{
    public function getAllUsers(){

        $users = DB::select('select * from users');
        return $users;
    }
}

