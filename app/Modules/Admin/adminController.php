<?php

namespace App\Modules\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Admin\AdminService;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService) {
        $this->adminService = $adminService;
    }

    public function index()
    {
        return view('criaProdutos');
    }

    public function cria(Request $request) {
        $data = $request->only( [
            'id' => 'id',
            'nome' => 'nome',
            'categoria_id' => 'categoria'
        ]);
        
        return $this->adminService->cria($data);


    }

}
