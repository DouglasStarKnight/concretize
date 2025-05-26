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
   'image'
 ];
public function findAll()
{
    $produtos = DB::table('produtos as produtos')
        ->select(
            'produtos.id',
            'produtos.nome',
            'produtos.categoria_id',
            'produtos.valor_produto',
            'produtos.image',
            'categoria.nome as categoria_nome'
        )
        ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
        ->get();
// dd($produtos);
    return $produtos;
}

public function excluir($id) {
    return DB::table('produtos')->where('id', $id)->delete();
}

}
