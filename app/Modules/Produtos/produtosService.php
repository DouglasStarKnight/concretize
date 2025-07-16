<?php

namespace App\Modules\Produtos;

use App\Modules\Admin\AdminModel;
use Illuminate\Support\Facades\DB;
use App\Modules\Inicio\InicioModel;
use app\Modules\Produtos\ProdutosModel;
use App\Modules\Produtos\ProdutosRepository;
use Exception;

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
        $produtos = DB::table('produtos')
        ->join('categoria', 'categoria.id', '=', 'produtos.categoria_id')
        ->when($querys->tipo, function($query, $tipo) {
            return $query->where('categoria.nome', $tipo);
        })
        ->when($querys->find, function($query, $find) {
            return $query->where('produtos.nome', 'LIKE', '%' . $find . '%');
        })
        ->select('produtos.id', 'produtos.nome', 'produtos.valor_produto', 'produtos.image', 'produtos.categoria_id')
        ->get();
// dd($produtos, isset($produtos) ? 'ta vazio' : 'tem algo');

        return view('listagem', ['produtos' => $produtos, 'tipo' =>$querys->tipo]);
    }

    public function descricao($id){
        try{
            $produto = $this->produtosRepository->produtoById($id);
            return view('produtos.descricao', ['produto' => $produto]);
        }catch( Exception $err){
           return redirect('inicio.index')->withErrors($err->getMessage()); 
        }
    }

    //  public function listagem(){
    //     $querys = json_decode(json_encode([
    //         'find' => isset($req->find) ? $req->find : null,
    //         'tipo' =>isset($req->tipo) ? $req->tipo : null,
    //     ]));
    // }
}
