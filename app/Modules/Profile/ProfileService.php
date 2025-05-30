<?php

namespace App\Modules\Profile;

use App\Models\User;
use App\Modules\Inicio\InicioModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Profile\ProfileModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use App\Modules\Profile\ProfileRepository;

class ProfileService
{

    public function __construct( private ProfileRepository $profileRepository, private ProfileModel $model){
        $this->profileRepository = $profileRepository;
        $this->model = $model;
    }

    public function index() {
        $user = $this->model->select('id','nome', 'email', 'data_nascimento', 'image')->get();
        return view('profile',['user' => $user]);
    }


    public function atualiza($data, $id){
        $path = Storage::disk('s3')->put('produtos', $data['image']);
        if (!$path) {
            return ['message' => 'Falha ao salvar imagem.'];
        }

        $body = [
            'nome' => isset($data['nome']) ? $data['nome'] : null,
            'data_nascimento' => isset($data['data_nascimento']) ? $data['data_nascimento'] : null,
            'email' => isset($data['email']) ? $data['email'] : null,
            'image' => isset($data['image']) ? $data['image'] : null,
        ];
        $this->profileRepository->atualiza($body, $id);

        return redirect()->route('profile.index')->with(['message' => 'perfil atualizado.']);
    }
}
