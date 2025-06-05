<?php

namespace App\Modules\Compra;

use App\Models\User;
use App\Modules\Compra\CompraModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Compra\CompraRepository;
use app\Modules\Produtos\ProdutosModel;
use app\Modules\Slides\SlidesModel;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class CompraService
{

    public function __construct(private CompraModel $compraModel, private CompraRepository $compraRepository){
        $this->compraModel = $compraModel;
    }

    public function findAll(){
        $produtos = $this->compraModel->findAll();

        return view('administracao.criaProdutos');
    }
    public function cria($data){
        try{
            $path = Storage::disk('s3')->put('produtos', $data['image']);

            if (!$path) {
                return ['message' => 'Falha ao salvar imagem.'];
            }

            $body = [
                'nome' => $data['nome'],
                'categoria_id' => $data['categoria_id'],
                'valor_produto' => $data['valor_produto'],
                'estoque' => $data['estoque'],
                'tipo_de_venda' => $data['tipo_de_venda'],
                'image' => $path,
            ];
            $this->compraRepository->cria($body);
            return  redirect()->back()->with(['message' => 'Produto adicionado com sucesso.']);
        }catch(Exception $err){
            return redirect('admin.index')->withErrors($err->getMessage());
        }
    }



    public function edita($data, $id){
        try{
            $registro = CompraModel::find($id);
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
            $this->compraRepository->atualiza($body, $id);
            return redirect()->back()->with('message', 'Produto editado com sucesso!');
        }catch(Exception $err){
            return redirect('admin.index')->withErrors($err->getMessage());
        }
    }
    public function excluir($request, $id){
        $this->compraRepository->excluir($id);
        return redirect()->back()->with(['message' => 'Produto excluído com sucesso!']);
    }

}
