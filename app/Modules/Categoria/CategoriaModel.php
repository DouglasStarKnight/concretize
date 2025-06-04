<?php
namespace App\Modules\Categoria;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class CategoriaModel extends Model
{
 use HasFactory;


 protected $table = 'categoria';
 protected $fillable = [
   'nome',
 ];
public function findAll(){

    $data = DB::table('categoria as catego')
    ->select('catego.id', 'catego.nome')
    ->get();

    return $data;
}

}
