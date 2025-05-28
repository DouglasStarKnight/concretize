<?php

namespace App\Modules\Admin;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use App\Modules\Admin\AdminRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AdminService
{

    public function __construct(private AdminModel $adminModel, private AdminRepository $adminRepository){
        $this->adminModel = $adminModel;
        // $this->AdminRepository = $adminRepository;
    }

    public function cria($data){
        $body = ([
            'nome' => $data['nome'],
            'categoria_id' => $data['categoria_id'],
            'valor_produto' => $data['valor_produto'],
            'image' => $data['image'],
        ]);

        $this->adminRepository->cria($body);

        return redirect()->route('admin.index')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function findAll(){
        $produtos = $this->adminModel->findAll();

        return view('administracao.criaProdutos',
    [
        // 'produtos' => $produtos
    ]);
    }

    public function edita($data, $id){
         $body = ([
            'nome' => isset($data['nome']) ? $data['nome'] : null,
            'categoria_id' => isset($data['categoria_id']) ? $data['categoria_id'] : null,
            'valor_produto' => isset($data['valor_produto']) ? $data['valor_produto'] : null,
            'image' => isset($data['image']) ? $data['image'] : null,
        ]);
        $this->adminRepository->atualiza($body, $id);
        return redirect()->back()->with('success', 'Produto editado com sucesso!');
    }
    public function excluir($request, $id){
        $this->adminRepository->excluir($id);
        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }
}
