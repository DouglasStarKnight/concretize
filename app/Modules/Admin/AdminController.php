<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use App\Modules\Admin\dto\CreateAdmin;
use App\Modules\Admin\dto\UpdateAdmin;
use App\Modules\Categoria\CategoriaModel;
use App\Modules\Destaque\DestaqueModel;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(private DestaqueModel $destaqueModel, private AdminService $adminService, private AdminModel $adminModel, private SlidesModel $slidesModel, private CategoriaModel $categoriaModel) {
        $this->adminService = $adminService;
        $this->adminModel = $adminModel;
    }

    public function index()
    {
        $buscaGrupos = $this->adminModel->buscaDestaques();
        $produtos = $this->adminModel->findAll();
        $categoria = $this->categoriaModel->findAll();
        $slides = $this->slidesModel->findAll();
        $destaques = $this->destaqueModel->findAll();
        return view('administracao.criaProdutos', [
            'produtos' => $produtos,
            'slides' => $slides,
            'categorias' => $categoria,
            'destaques' => $destaques
        ]);
    }

    public function cria(CreateAdmin $request) {
        $data = $request->validated();
        return $this->adminService->cria($data);
    }

    public function edita(UpdateAdmin $request, int $id){
        $data = $request->validated();
       return $this->adminService->edita($data, $id);
    }

    public function delete(Request $request, int $id){
        return $this->adminService->excluir($request, $id);
    }

    public function destaque(Request $req){
        return $this->adminService->destaque($req);
    }

}
