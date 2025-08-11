<?php
namespace App\Modules\Destaque;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestaqueModel extends Model
{
 use HasFactory;

 protected $table = 'destaque';
 protected $fillable = [
   'nome',
   'produtos_id'
 ];

 public function findAll(){
   $data = DB::table('destaque as dest')
    ->join('produtos as produto', function($join) {
        $join->whereRaw("FIND_IN_SET(produto.id, dest.produtos_id)");
    })
    ->select(
        'dest.id as destaque_id',
        'dest.nome as destaque_nome',
        'dest.produtos_id',
        'produto.id as produto_id',
        'produto.nome as produto_nome',
        'produto.valor_produto',
        'produto.estoque'
    )
    ->orderBy('produto.id')
    ->get();

$dadosProcessados = $data->groupBy('destaque_id')->map(function ($itens) {
    $primeiro = $itens->first();

    return [
        'id' => $primeiro->destaque_id,
        'nome' => $primeiro->destaque_nome,
        'produtos' => $itens->map(function ($prod) {
            return [
                'id' => $prod->produto_id,
                'nome' => $prod->produto_nome,
                'valor_produto' => $prod->valor_produto,
                'estoque' => $prod->estoque,
            ];
        })->values()->toArray()
    ];
})->values();


dd($dadosProcessados);
    return [
        'data' => $dadosProcessados
    ];
 }
}