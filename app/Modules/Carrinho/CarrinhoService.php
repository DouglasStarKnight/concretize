<?php

namespace App\Modules\Carrinho;

use App\Models\User;
use App\Modules\Carrinho\CarrinhoModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Carrinho\CarrinhoRepository;
use app\Modules\Produtos\ProdutosModel;
use app\Modules\Slides\SlidesModel;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class CarrinhoService
{

    public function __construct(private CarrinhoModel $carrinhoModel, private CarrinhoRepository $carrinhoRepository){
        $this->carrinhoModel = $carrinhoModel;
    }

    public function index(){
        $carrinho = $this->carrinhoModel->findAll();
        // dd($carrinho);

        return view('carrinho.index', ['carrinho' => $carrinho]);
    }
    public function pagamento(){
        return view('carrinho.pagamento');
    }

    public function cria($data){
        try{

            $body = [
                'nome' => $data['nome'],
                'produto_id' => $data['produto_id'],
                'quantidade' => $data['quantidade'],
                'valor_produto' => $data['valor_produto'],
                'image' => $data['image']
            ];
            $this->carrinhoRepository->cria($body);
            // if(){

            // }
            return  redirect()->route('inicio.index')->with(['message' => 'Produto adicionado ao carrinho!']);
        }catch(Exception $err){
            return redirect('admin.index')->withErrors($err->getMessage());
        }
    }



    public function edita($data, $id){
        try{
            $registro = CarrinhoModel::find($id);
            if(isset($data['image'])){
                if(isset($registro->image)){
                    storage::disk('s3')->delete($registro->image);
                   $path = storage::disk('s3')->put('produtos', $data['image']);
                }else{
                    $path = storage::disk('s3')->put('produtos', $data['image']);
                }
            }
    
             $body = ([
                'nome' => isset($data['nome']) ? $data['nome'] : null,
                'categoria_id' => isset($data['categoria_id']) ? $data['categoria_id'] : null,
                'valor_produto' => isset($data['valor_produto']) ? $data['valor_produto'] : null,
                'estoque' => isset($data['estoque']) ? $data['estoque'] : null,
                'image' => isset($path) ? $path : $registro->image
            ]);
            $this->carrinhoRepository->atualiza($body, $id);
            return redirect()->back()->with('message', 'Produto editado com sucesso!');
        }catch(Exception $err){
            return redirect('admin.index')->withErrors($err->getMessage());
        }
    }
    public function excluir($request, $id){
        $this->carrinhoRepository->excluir($id);
        return redirect()->back()->with(['message' => 'Produto excluído com sucesso!']);
    }

}
