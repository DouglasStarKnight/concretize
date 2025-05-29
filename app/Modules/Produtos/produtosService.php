<?php

namespace App\Modules\Produtos;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use App\Modules\Inicio\InicioModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Produtos\ProdutosRepository;

class ProdutosService
{

    public function __construct(private InicioModel $registerModel, private AdminModel $adminModel, private ProdutosRepository $produtosRepository){
        $this->registerModel = $registerModel;
        $this->adminModel = $adminModel;
    }

    public function index($req) {
        $querys = json_decode(json_encode([
            'find' => isset($req->find) ? $req->find : null,
        ]));
        $produtos = $this->produtosRepository->findAll($querys);
        return view('listagem' ,['produtos' => $produtos['data']]);
    }

}
