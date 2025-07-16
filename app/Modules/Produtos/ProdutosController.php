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

    public function index(Request $req){
        return $this->produtosService->index($req);
    }

    public function descricao($id){
        return $this->produtosService->descricao($id);
    }

    // public function listagem(Request $req){
    //     return $this->produtosService->listagem($req);
    // }

}
