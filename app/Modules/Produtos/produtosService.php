<?php

namespace App\Modules\Produtos;

use App\Models\User;
use App\Modules\Admin\AdminModel;
use App\Modules\Inicio\InicioModel;
use app\Modules\Produtos\ProdutosModel;
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
            'tipo' =>isset($req->tipo) ? $req->tipo : null,
        ]));
        $produtos = (new ProdutosModel)
        ->when($querys->tipo == 'acabamento')
        ->when($querys->tipo == 'basicos')
        ->when($querys->tipo == 'eletricos')
        ->when($querys->tipo == 'tubulacoes')
        ->when($querys->tipo == 'conexcoes')
        ->when($querys->tipo == null)
        ->select('produtos.nome', 'produtos.valor_produto', 'produtos.image', 'produtos.categoria_id')
        ->where(fn($query) => $query->orWhere('produtos.nome', 'LIKE', '%' . $querys->find. '%'))
        ->get();
        // dd($produtos);
        return view('listagem', ['produtos' => $produtos, 'tipo' =>$querys->tipo]);
    }

    //  public function listagem(){
    //     $querys = json_decode(json_encode([
    //         'find' => isset($req->find) ? $req->find : null,
    //         'tipo' =>isset($req->tipo) ? $req->tipo : null,
    //     ]));
    // }
}
