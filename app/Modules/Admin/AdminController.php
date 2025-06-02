<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use App\Modules\Admin\dto\CreateAdmin;
use App\Modules\Admin\dto\UpdateAdmin;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService, private AdminModel $adminModel, private SlidesModel $slidesModel) {
        $this->adminService = $adminService;
        $this->adminModel = $adminModel;
    }

    public function index()
    {
        $produtos = $this->adminModel->findAll();
        $slides = $this->slidesModel->findAll();
        return view('administracao.criaProdutos', [
            'produtos' => $produtos,
            'slides' => $slides
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

    public function slides(Request $req, $id) {
        dd($req);
        return $this->adminService->slides($req, $id);
    }

    public function delete(Request $request, int $id){
        return $this->adminService->excluir($request, $id);
    }

}
