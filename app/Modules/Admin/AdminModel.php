<?php
namespace app\Modules\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class AdminModel extends Model
{
 use HasFactory;


 protected $table = 'produtos';
 protected $fillable = [
   'nome',
   'categoria_id',
   'valor_produto',
   'image',
   'promocoes_id',
 ];
public function findAll()
{
    $produtos = DB::table('produtos as produtos')
        ->select(
            'produtos.id',
            'produtos.nome',
            'produtos.categoria_id',
            'produtos.valor_produto',
            'produtos.promocoes_id',
            'produtos.image',
            'categoria.nome as categoria_nome'
        )
        ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
        ->get();
    return $produtos;
}

public function cria(){

}

// public function edita($id){
//     return DB::table('produtos')->where('id', $id)->update();
// }

// public function delete($id) {
//     return DB::table('produtos')->where('id', $id)->delete();
// }

}
