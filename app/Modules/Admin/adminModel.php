<?php
namespace App\Modules\Admin;


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
 ];
 public function findAll($querys)  {
      DB::table("produtos as produtos")
      ->select("produtos.id","produtos.nome", "produtos.categoria_id")
      ->leftjoin("categoria", "produtos.categoria_id", "=", "categoria.id")
      ->get();
 }
}
