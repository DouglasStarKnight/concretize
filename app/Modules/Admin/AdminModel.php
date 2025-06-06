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
            'categoria.nome as categoria_nome',
            'produtos.estoque',
            'produtos.tipo_de_venda',
            // 'slides.caminho as caminho_slides',
        )
        ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
        ->get();
    return $produtos;
}
}
