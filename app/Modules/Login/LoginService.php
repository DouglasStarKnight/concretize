<?php

namespace App\Modules\Login;

use App\Modules\Login\loginModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{

    public function __construct(private loginModel $loginModel){
        $this->loginModel = $loginModel;
    }

    public function login( $req){
        try{
            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
                return redirect()->intended(route('inicio.index'));
            }
        }catch(Exception $err){
            return redirect('admin.index')->withErrors($err->getMessage());
        }
}


     public function logout($req) {
    Auth::logout();
    try {
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('inicio.index');
    } catch (\Throwable $e) {

    }
}

}
