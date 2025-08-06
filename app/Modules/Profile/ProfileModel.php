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


 protected $table = 'users';
 protected $fillable = [
   'nome',
   'email',
   'data_nascimento',
   'image',
   'password',
 ];
public function findAll(){

    $data = DB::table('users as user')
    ->select('user.id', 'user.nome', 'user.data_nascimento', 'user.password', 'user.image', 'user.email')
    ->get();
    // dd($data);
    return [
       'data' => $data
    ];
}

public function findById($id){
  DB::table($this->table . ' as us')
  ->select('*')
  ->where('id', $id)
  ->get();
}

}
