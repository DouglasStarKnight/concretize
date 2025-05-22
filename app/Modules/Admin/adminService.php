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
    public function cria(array $data){

        $produto = $this->adminModel::create([
            'nome' => $data['nome'],
            'categoria_id' => $data['categoria_id'],
            'valor_produto' => $data['valor_produto'],
            'image' => $data['image']
        ]);
        // dd($produto);

        return redirect()->route('admin.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function findAll(){
        $produtos = $this->adminModel::select('id', 'nome', 'valor_produto', 'categoria_id', 'image')->get();


        return view('criaProdutos',
    [
        'produtos' => $produtos
    ]);
    }
}
