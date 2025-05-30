<?php
namespace app\Modules\Profile;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class ProfileModel extends Model
{
 use HasFactory;


 protected $table = 'produtos';
 protected $fillable = [
   'nome',
   'email',
   'data_nascimento',
   'image',
   'password',
 ];
public function findAll($querys){

    $data = DB::table('produtos as produtos')
    ->select('produtos.id', 'produtos.nome', 'produtos.categoria_id', 'produtos.valor_produto', 'produtos.promocoes_id', 'produtos.image',  'categoria.nome as categoria_nome')
    ->leftJoin('categoria', 'produtos.categoria_id', '=', 'categoria.id')
    ->where(function($query)use($querys){
    $query->orWhere('produtos.nome','LIKE','%' . $querys->find . '%');
    })
    ->get();
    return [
       'data' => $data
    ];
}

}
