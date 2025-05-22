<?php

namespace App\Modules\Produtos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Produtos\produtosService;


class ProdutosController extends Controller
{
    public function __construct(private ProdutosService $produtosService) {
        $this->produtosService = $produtosService;
        // $this->adminModel = $adminModel;
    }

    public function index()
    {
        return $this->produtosService->index();
    }

    // public function cria(Request $request) {

    //     $data = [
    //         'nome' => $request->input('nome'),
    //         'categoria_id' => $request->input('categoria'),
    //         'valor_produto' => $request->input('valor'),
    //         // 'image' =>  $request->file('image')
    //     ];
    //     if($request->hasfile('image') && $request->file('image')->isValid()) {
    //         $imagem = $request->file('image');
    //         $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension(); // ex: 1712345678.jpg
    //         $caminho = $imagem->storeAs('produtos', $nomeImagem, 'public'); // pasta: storage/app/public/produtos

    //         $data['image'] = $caminho;
    //     }
    // }


}
