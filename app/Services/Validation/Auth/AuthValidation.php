<?php

namespace App\Services\Validation\Auth;

class AuthValidation{
    public static function registerCustomer($request){
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
    }

    public static function registerAdmin($request){
        return $request->validate([
            'role_id'=>'required',
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
    }

    public static function login($request){
        return $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    }
}