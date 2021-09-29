<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Auth\AuthServices;

class AuthController extends Controller
{
    private $authServices;

    public function __construct(AuthServices $authServices){
        $this->services = $authServices;
    }

    public function registerCustomer(Request $request) {
        return $this->services->registerCustomer($request);
    }

    public function registerAdmin(Request $request) {
        return $this->services->registerAdmin($request);
    }

    public function loginCustomer(Request $request) {
        return $this->services->loginCustomer($request);
    }

    public function loginAdmin(Request $request) {
        return $this->services->loginAdmin($request);
    }

    public function logout(Request $request) {
        return $this->services->logout();
    }
}
