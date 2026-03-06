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

    public function index(){
        return $this->carrinhoService->index();
    }
    public function pagamento(){
        return $this->carrinhoService->pagamento();
    }

    public function cria(CreateCarrinho $req) {
    try {
        $data = $req->validated();
        $carrinho = $this->carrinhoService->cria($data);
                
        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Produto adicionado ao carrinho com sucesso!',
            'dados' => $carrinho
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'sucesso' => false,
            'mensagem' => 'Ocorreu um problema ao adicionar o produto.',
            'erro' => $e->getMessage()
        ], 500);
    }
}

    // public function edita(UpdateCarrinho $request, int $id){
    //     $data = $request->validated();
    //    return $this->carrinhoService->edita($data, $id);
    // }

    public function delete(Request $req,int $id){
        return $this->carrinhoService->excluir($req, $id);
    }

}
