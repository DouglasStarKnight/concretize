<?php

namespace App\Modules\Admin;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Admin\AdminRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class AdminService
{

    public function __construct(private AdminModel $adminModel, private AdminRepository $adminRepository){
        $this->adminModel = $adminModel;
        // $this->AdminRepository = $adminRepository;
    }

    public function cria($data){

    $path = Storage::disk('s3')->put('produtos', $data['image']);

    if (!$path) {
        return ['message' => 'Falha ao salvar imagem.'];
    }

    $body = [
        'nome' => $data['nome'],
        'categoria_id' => $data['categoria_id'],
        'valor_produto' => $data['valor_produto'],
        'image' => $path,
    ];
    $produtoCriado = $this->adminRepository->cria($body);

    return redirect()->route('admin.index');
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
