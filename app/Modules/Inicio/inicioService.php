<?php

namespace App\Modules\Inicio;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Inicio\InicioModel;
class InicioService
{

    public function __construct(private InicioModel $registerModel){
        $this->registerModel = $registerModel;
    }

    // Método para criar um novo usuário
    public function cria(array $data)
    {

        

        // return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }
}
