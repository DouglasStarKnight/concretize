<?php

namespace App\Modules\Profile;

use App\Models\User;
use App\Modules\Inicio\InicioModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Profile\ProfileModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use App\Modules\Profile\ProfileRepository;
use Exception;

class ProfileService
{

    public function __construct( private ProfileRepository $profileRepository, private ProfileModel $model){
        $this->profileRepository = $profileRepository;
        $this->model = $model;
    }

    public function index($id) {
        $user = $this->profileRepository->findById($id);
        return view('profile',['user' => $user]);
    }

    public function atualiza($data, $id){
        $registro = ProfileModel::find($id);
            if(isset($data['image'])){
                if(isset($registro->image)){
                    storage::disk('s3')->delete($registro->image);
                   $path = storage::disk('s3')->put('produtos', $data['image']);
                }else{
                    $path = storage::disk('s3')->put('produtos', $data['image']);
                }
            }
             $body = ([
                'nome' => isset($data['nome']) ? $data['nome'] : null,
                'email' => isset($data['email']) ? $data['email'] : null,
                // 'password' => isset($data['password']) ? $data['password'] : null,
                // 'data_nascimento' => isset($data['data_nascimento']) ? $data['data_nascimento'] : null,
                'image' => isset($path) ? $path : $registro->image
            ]);
            // dd($data, $body, $path);
        $this->profileRepository->atualiza($body, $id);

        return redirect()->route('profile.index')->with(['message' => 'perfil atualizado.']);
    }
}
