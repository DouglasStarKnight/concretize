<?php

namespace App\Modules\Admin;

use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;
use App\Http\Controllers\Controller;
use App\Modules\Admin\dto\CreateAdmin;
use App\Modules\Admin\dto\UpdateAdmin;
use Exception;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return $this->adminService->findAll();
    }

    public function cria(CreateAdmin $request)
    {
        try {
            $data = $request->validated();
            return $this->adminService->cria($data);
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Produto criado com sucesso!',
                'dados' => $carrinho
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Ocorreu um problema ao criar o produto.',
                'erro' => $e->getMessage()
            ], 500);
        }
    }

    public function edita(UpdateAdmin $request, int $id)
    {
        try{
            $data = $request->validated();
            return $this->adminService->edita($data, $id);

        }catch(Exception $err){

        }
    }

    public function delete(Request $request, int $id)
    {
        return $this->adminService->excluir($request, $id);
    }

    public function destaque(Request $req)
    {
        return $this->adminService->destaque($req);
    }
    public function destaqueEdita(Request $req, int $id)
    {
        return $this->adminService->destaqueEdita($req, $id);
    }
    public function exclui_destaque(Request $req, int $id)
    {
        return $this->adminService->exclui_destaque($req, $id);
    }
}
