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
    public function cria($data){
dd($data);
        $produto = $this->adminModel::create([
            'nome' => $data['nome'],
            'categoria_id' => $data['categoria_id'],
            'valor_produto' => $data['valor_produto'],
            'image' => $data['image'],
            'promoções_id' => null
        ]);
        // dd($produto);

        return redirect()->route('admin.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function findAll(){
        $produtos = $this->adminModel->findAll();

        return view('administracao.criaProdutos',
    [
        // 'produtos' => $produtos
    ]);
    }

    public function edita($id, $data){
         $produto = ([
            'nome' => $data['nome'],
            'categoria_id' => $data['categoria_id'],
            'valor_produto' => $data['valor_produto'],
            'image' => $data['image'],
            'promoções_id' => null
        ]);
        $this->adminModel->edita($produto);
        return redirect()->back()->with('success', 'Produto editado com sucesso!');
    }
    public function excluir($request, $id){
        $this->adminModel->excluir($id);
        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }
}
