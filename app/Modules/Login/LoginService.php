<?php

namespace App\Modules\Login;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Login\loginModel;
class LoginService
{

    public function __construct(private loginModel $loginModel){
        $this->loginModel = $loginModel;
    }

    public function login($data){
        $user = $this->loginModel->where('email', $data['email'])->first();

        if($user && Hash::check($data['password'], $user->password)){
            return redirect()->route('inicio.index');
        }
    }
}
