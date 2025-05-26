<?php

namespace app\Modules\inicio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class inicioModel
{
    use HasApiTokens, HasFactory, Notifiable;

    // Define a tabela associada
    // protected $table = 'users';

    public function cria() {

    }

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome', 'data_nascimento', 'bairro_id', 'email', 'password','created_at', 'updated_at'
    ];

    // Campos que devem ser escondidos (não serão retornados nas respostas)
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // Tipos de dados
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'data_nascimento' => 'date', // Vai garantir que o campo seja interpretado como data
    // ];

    // Habilitando a manipulação automática de created_at e updated_at
    public $timestamps = true;
}
