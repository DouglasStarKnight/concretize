<?php
namespace App\Modules\Slides;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class SlidesModel extends Model
{
 use HasFactory;


 protected $table = 'slides';
 protected $fillable = [
   'caminho',
   'posicao'
 ];
public function findAll(){

    $data = DB::table('slides as slide')
    ->select('slide.id', 'slide.caminho', 'slide.posicao')
    ->get();

    return $data;
}

}
