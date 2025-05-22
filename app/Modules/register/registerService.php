<?php

namespace App\Modules\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Register\RegisterModel;
class RegisterService
{

    public function __construct(private RegisterModel $registerModel){
        $this->registerModel = $registerModel;
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

        return redirect()->route('login.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
