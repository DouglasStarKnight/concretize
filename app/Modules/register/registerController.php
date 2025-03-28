<?php

namespace App\Modules\register\registerController;

use app\Http\Controllers\Controller;
use app\Modules\register\registerService;  // Corrija a namespace se necessário
use Illuminate\Http\Request;

class registerController extends Controller
{
    // Variável para o serviço
    private $registerService;

    // Injetando o serviço no controlador
    public function __construct( $registerService)
    {
        $this->registerService = $registerService;  // Atribuindo o serviço à variável
    }

    public function register(Request $request)
    {
        // Validando os dados recebidos na requisição
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Chamando o método cria do serviço RegisterService para fazer o registro
        return $this->registerService->cria($validated);
    }
}
