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
        // Criação do usuário no banco de dados


        dd($data['nome']);


        $user = user::create([
            'nome' => $data['nome'],
            'data_nascimento' => $data['data_nascimento'],
            // 'bairro_id' => $data['bairro_id'],
            'email' => $data['email'],
            'senha' => Hash::make($data['senha']),
        ]);

    dd($user); // Para verificar os dados inseridos

        // $this->registerModel->cria();
        // redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!')
        // return view('register');
    }
}
