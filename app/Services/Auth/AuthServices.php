<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;

//Services
use App\Services\BaseServices;
use App\Services\Validation\Auth\AuthValidation;


class AuthServices extends BaseServices{

    private $userModel = User::class;

    public function registerCustomer($request){
        $fields = AuthValidation::registerCustomer($request);

        $user = $this->baseRI->storeInDB(
            $this->userModel,
            [
                'role_id' => '0',
                'is_admin' => 0,
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password'])
            ]
        );

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function registerAdmin($request){
        if(auth()->user()->is_admin == true){
            $fields = AuthValidation::registerAdmin($request);
    
            $user = $this->baseRI->storeInDB(
                $this->userModel,
                [
                    'role_id' => $fields['role_id'],
                    'is_admin' => 1,
                    'name' => $fields['name'],
                    'email' => $fields['email'],
                    'password' => bcrypt($fields['password'])
                ]
            );
    
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'token' => $token
            ];
    
            return response($response, 201);
        }else{
            $response = [
                'user' => 'You are not Authorized',
            ];
    
            return response($response, 401);
        }
    }

    public function loginCustomer($request) {
        $fields = AuthValidation::login($request);
        // Check email
        $user = $this->baseRI->userGetByEmail($fields['email']);
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Email or Password Did Not Match!'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 200);
    }

    public function loginAdmin($request) {
        $fields = AuthValidation::login($request);
        // Check email
        $user = $this->baseRI->userGetByEmail($fields['email']);
        if($user->is_admin == true){
            if(!$user || !Hash::check($fields['password'], $user->password)) {
                return response([
                    'message' => 'Email or Password Did Not Match!'
                ], 401);
            }
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];
    
            return response($response, 200);
        }else{
            $response = [
                'user' => 'You are not Authorized',
            ];
            return response($response, 401);
        }
    }

    public function logout(){
        $this->baseRI->userAuthenticated()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}