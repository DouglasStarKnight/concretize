<?php

namespace App\Modules\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Register\registerService;

class RegisterController extends Controller
{
    public function __construct(private registerService $registerService) {}

    public function showForm()
    {
        return view('register');
    }

    public function cria(Request $request)
    {
        $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'data_nascimento' => 'required',
        'bairro_id' => '',
        'senha' => 'required|min:5',
        ]);
        // dd($validated);
        return $this->registerService->cria($validated);

    }
}
