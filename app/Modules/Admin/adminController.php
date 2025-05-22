<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService, private AdminModel $adminModel) {
        $this->adminService = $adminService;
        $this->adminModel = $adminModel;
    }

    public function index()
    {
        $produtos = $this->adminModel::select('id', 'nome', 'valor_produto', 'categoria_id', 'image')->get();

        return view('criaProdutos', [
            'produtos' => $produtos
        ]);
    }

    public function cria(Request $request) {

        $data = [
            'nome' => $request->input('nome'),
            'categoria_id' => $request->input('categoria'),
            'valor_produto' => $request->input('valor'),
            'image' =>  $request->file('image')
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagem = $request->file('image');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();

            $caminho = $imagem->storeAs('produtos', $nomeImagem, 's3');

            // MONTA A URL MANUALMENTE
            $url = 'https://' . env('AWS_BUCKET') . '.s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . $caminho;

            $data['image'] = $url;
        }

        return $this->adminService->cria($data);
    }

    // public function findAll(){

    //     return $this->adminService->findAll();
    // }

}
