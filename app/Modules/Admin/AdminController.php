<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use App\Modules\Admin\dto\CreateAdmin;
use App\Modules\Admin\dto\UpdateAdmin;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService) {
        $this->adminService = $adminService;
    }

    public function index(){
        return $this->adminService->findAll();
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
    public function destaqueEdita(Request $req, int $id){
        return $this->adminService->destaqueEdita($req, $id);
    }
    public function exclui_destaque(Request $req, int $id){
        return $this->adminService->exclui_destaque($req, $id);
    }
}
