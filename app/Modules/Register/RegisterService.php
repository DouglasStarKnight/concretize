<?php

namespace App\Modules\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Register\RegisterModel;
class RegisterService
{

    public function __construct(private RegisterRepository $registerRepository){
        $this->registerRepository = $registerRepository;
    }

    // Método para criar um novo usuário
    public function cria(array $data)
    {

        $body = [
            'nome' => $data['nome'],
            'password' => hash::make($data['password']),
            'data_nascimento' => $data['data_nascimento'],
            'email' => $data['email'],
        ];

        $this->registerRepository->cria($body);
        return redirect()->route('login.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
