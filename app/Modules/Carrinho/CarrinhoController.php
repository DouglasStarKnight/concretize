<?php

namespace App\Modules\Carrinho;

use Illuminate\Http\Request;
use App\Modules\Carrinho\CarrinhoService;
use App\Http\Controllers\Controller;
use App\Modules\Carrinho\dto\CreateCarrinho;
use App\Modules\Carrinho\dto\UpdateCarrinho;
use App\Modules\Categoria\CategoriaModel;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Storage;

class CarrinhoController extends Controller
{
    public function __construct(private CarrinhoService $carrinhoService, private CarrinhoModel $carrinhoModel, private SlidesModel $slidesModel, private CategoriaModel $categoriaModel) {
        // $this->CarrinhoService = $CarrinhoService;
        // $this->CarrinhoModel = $CarrinhoModel;
    }

    public function index()
    {

        return view('carrinho');
    }

    public function cria(CreateCarrinho $req) {
        $data = $req->validated();
        // dd($data);
        return $this->carrinhoService->cria($data);
    }

    public function edita(UpdateCarrinho $request, int $id){
        $data = $request->validated();
       return $this->carrinhoService->edita($data, $id);
    }

    public function delete(Request $request, int $id){
        return $this->carrinhoService->excluir($request, $id);
    }

}
