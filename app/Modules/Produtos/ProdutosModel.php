<?php
namespace app\Modules\Produtos;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class ProdutosModel extends Model
{
 use HasFactory;


 protected $table = 'produtos';
 protected $fillable = [
   'nome',
   'categoria_id',
   'valor_produto',
   'image',
   'promocoes_id',
   'estoque'
 ];
public function findAll($querys){

    $data = DB::table('produtos as produtos')
    ->select('produtos.id', 'produtos.nome', 'produtos.categoria_id', 'produtos.valor_produto', 'produtos.promocoes_id', 'produtos.image',  'categoria.nome as categoria_nome', 'produtos.estoque')
    ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
    ->where(function($query)use($querys){
    $query->orWhere('produtos.nome','LIKE','%' . $querys->find . '%');
    })
    ->get();
    return [
       'data' => $data
    ];
}

public function produtoById($id){
  return DB::table($this->table)->where('id', $id)->first();
}

}
