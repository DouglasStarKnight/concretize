<?php

namespace App\Modules\Compra;

use Illuminate\Http\Request;
use App\Modules\Compra\CompraService;
use App\Http\Controllers\Controller;
use App\Modules\Compra\dto\CreateCompra;
use App\Modules\Compra\dto\UpdateCompra;
use App\Modules\Categoria\CategoriaModel;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Storage;

class CompraController extends Controller
{
    public function __construct(private CompraService $compraService, private CompraModel $compraModel, private SlidesModel $slidesModel, private CategoriaModel $categoriaModel) {
        // $this->CompraService = $CompraService;
        // $this->CompraModel = $CompraModel;
    }

    public function index()
    {

        return view('carrinho');
    }

    public function cria(CreateCompra $request) {
        $data = $request->validated();
        return $this->compraService->cria($data);
    }

    public function edita(UpdateCompra $request, int $id){
        $data = $request->validated();
       return $this->compraService->edita($data, $id);
    }

    public function delete(Request $request, int $id){
        return $this->compraService->excluir($request, $id);
    }

}
