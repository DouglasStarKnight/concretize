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
   $data = DB::table($this->table . ' as dest')
    ->select('dest.*')
    ->get();

    return [
        'data' => $data
    ];
 }
}