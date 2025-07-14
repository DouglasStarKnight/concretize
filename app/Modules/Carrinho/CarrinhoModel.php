<?php
namespace app\Modules\Carrinho;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class CarrinhoModel extends Model
{
 use HasFactory;


 protected $table = 'carrinho_itens';
 protected $fillable = [
   'produto_id',
   'quantidade',
   'carrinho_id',
   'preco',
 ];
public function findAll()
{
    $carrinho = DB::table('carrinho_itens as cn')
        ->select(
            'cn.id',
            'p.nome',
            'cn.quantidade',
            'cn.carrinho_id',
            'cn.preco',
            'cn.image',
        )
        ->leftJoin('produtos as p', 'p.id', '=', 'cn.user_id')
        ->leftJoin('carrinho as carrinho', 'carrinho.id', '=', 'cn.carrinho_id')
        ->get();
    return $carrinho;
}
}
