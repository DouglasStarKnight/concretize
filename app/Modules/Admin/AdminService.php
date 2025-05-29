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

        // $data['image'] já é UploadedFile
  // Salva a imagem no S3 e pega o caminho
    $path = Storage::disk('s3')->putFile('produtos', $data['image']);
    // dd($path);

    if (!$path) {
        return ['message' => 'Falha ao salvar imagem.'];
    }

    // Monta os dados para salvar no banco, usando o caminho da imagem no S3
    $body = [
        'nome' => $data['nome'],
        'categoria_id' => $data['categoria_id'],
        'valor_produto' => $data['valor_produto'],
        'image' => $path, // aqui salva só o path (ex: 'produtos/arquivo.jpg')
    ];

    // Salva no banco usando o repository
    $produtoCriado = $this->adminRepository->cria($body); // Atenção ao nome do método correto

    if ($produtoCriado) {
        // Retorna sucesso e URL completa da imagem no S3
        $url = Storage::disk('s3')->url($path);
        // return [
        //     'produto' => $produtoCriado,
        //     'image_url' => $url,
        //     'message' => 'Produto criado e imagem salva com sucesso!',
        // ];
    }

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
