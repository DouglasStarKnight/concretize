<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterService
{
    // Método para criar um novo usuário
    public function cria(array $data)
    {
        // Criação do usuário no banco de dados
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),  // Criptografando a senha
        ]);

        // Você pode adicionar um evento para o usuário recém-registrado, se necessário
        event(new Registered($user));

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user
        ]);
    }
}
