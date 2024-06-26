<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(RegistroRequest $request){
        
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address' => $data['address'],
            'age' => $data['age'], 
            'statusSubscription' => 0,
            'role' => 'suscriptor',
        ]);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'email' => $user['email'],
            'name' => $user['name'],
            'address' => $user['address'],
            'age' => $user['age'],
            'statusSubscription' => $user['statusSubscription']
        ];
    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        if(!Auth::attempt($data)){
            return response([
                'errors' => ['El email o el password son incorrectos']
            ], 422);
        }

        $user = Auth::user();
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'email' => $user['email'],
            'name' => $user['name'],
            'address' => $user['address'],
            'age' => $user['age'],
            'statusSubscription' => $user['statusSubscription']
        ];
    }

    public function logout(Request $request){

        $user = $request->user();
        $user->currentAccessToken()->delete();

        return [
            'user' => null
        ];
    }
}
