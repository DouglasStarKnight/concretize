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

    // Método para criar um novo usuário
    public function cria(array $data)
    {

        $user = user::create([
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
            'bairro_id' => 0,
            'email' => $data['email'],
            'senha' => Hash::make($data['senha']),
        ]);

        // $this->registerModel->cria();
        // redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!')

    }
}
