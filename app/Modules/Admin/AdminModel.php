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
   'estoque',
   'tipo_de_venda',
 ];
public function findAll() {
    $produtos = DB::table('produtos as produtos')
        ->select(
            'produtos.id',
            'produtos.nome',
            'produtos.categoria_id',
            'produtos.valor_produto',
            'produtos.promocoes_id',
            'produtos.image',
            'categoria.nome as categoria_nome',
            'produtos.estoque',
            'produtos.tipo_de_venda',
            // 'slides.caminho as caminho_slides',
        )
        ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
        ->get();
    return $produtos;
}

public function buscaDestaques(){
    $dados = DB::table('destaque as dest')
    ->join('produtos as produto', function($join) {
        $join->whereRaw("FIND_IN_SET(produto.id, dest.produtos_id)");
    })
    ->select(
        'dest.*',
        DB::raw('GROUP_CONCAT(produto.nome ORDER BY produto.nome SEPARATOR ", ") as nomes_produtos')
    )
    ->groupBy('dest.id')
    ->get();

    // dd($dados);
}
}
