<?php
namespace app\Modules\Register;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Laravel\Prompts\select;


class RegisterModel extends Model
{
 use HasFactory;


 protected $table = 'users';
 protected $fillable = [
   'nome',
   'password',
   'data_nascimento',
   'email',
   'image',
 ];
public function findAll()
{
    $data = DB::table('users as users')
        ->select(
            'users.id',
            'users.nome',
            'users.password',
            'users.data_nascimento',
            'users.email',
        )
        ->get();
    return $data;
}


}
