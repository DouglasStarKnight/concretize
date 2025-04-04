<?php

namespace App\Modules\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Admin\AdminModel;
class AdminService
{

    public function __construct(private AdminModel $adminModel){
        $this->adminModel = $adminModel;
    }

    // Método para criar um novo usuário
    public function cria(array $data)
    {

// dd($data);

        if (!isset($data['nome']) || !isset($data['categoria'])) {
            throw new \InvalidArgumentException('Campos obrigatórios faltando.');
        }

        $produto = $this->adminModel::create([
            'nome' => $data['nome'],
            'categoria_id' => $data['categoria'],
        ]);
// dd($produto);
        return redirect()->route('inicio.index')->with('success', 'Cadastro realizado com sucesso!');
    }
}
