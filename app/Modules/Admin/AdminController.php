<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use App\Modules\Admin\dto\createAdmin;
use App\Modules\Admin\dto\UpdateAdmin;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService, private AdminModel $adminModel) {
        $this->adminService = $adminService;
        $this->adminModel = $adminModel;
    }

    public function index()
    {
        $produtos = $this->adminModel->findAll();
        return view('administracao.criaProdutos', [
            'produtos' => $produtos
        ]);
    }

    public function cria(Request $request) {
        dd($request);
        $data = $request->validated();
        return $this->adminService->cria($data);
    }

    public function edita(Request $request, int $id){
        dd($request, $id);
        // $data = [
        //     'nome' => $request->input('nome'),
        //     'categoria_id' => $request->input('categoria'),
        //     'valor_produto' => $request->input('valor'),
        //     'categoria_id' => $request->file('image'),
        // ];
        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $imagem = $request->file('image');
        //     $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();

        //     $caminho = $imagem->storeAs('produtos', $nomeImagem, 's3');

        //     // MONTA A URL MANUALMENTE
        //     $url = 'https://' . env('AWS_BUCKET') . '.s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . $caminho;

        //     $data['image'] = $url;
        // }
        // dd($id);
        // return $this->adminService->edita($request);
    }

    public function delete(Request $request, $id){
        return $this->adminService->excluir($request, $id);
    }

}
