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
        // dd($id);
        $user = $this->model->select('id','nome', 'email', 'data_nascimento', 'image')->get();
        return view('profile',['user' => $user]);
    }

    public function cria(){
        try{
            $body = "";
            $this->profileRepository->cria($body);
        }catch(Exception $err){
            return redirect('profile.index')->withErrors($err->getMessage());
        }
    }

    public function atualiza($req, $id){
        if(isset($req['image'])){
            $path = Storage::disk('s3')->put('produtos', $req['image']);
            if (!$path) {
        //         return ['message' => 'Falha ao salvar imagem.'];
            }
        }

        $body = [
            'nome' => isset($req['nome']) ? $req['nome'] : null,
            'data_nascimento' => isset($req['data_nascimento']) ? $req['data_nascimento'] : null,
            'email' => isset($req['email']) ? $req['email'] : null,
            'image' => isset($path) ? $path : null,
        ];
        $this->profileRepository->atualiza($body, $id);

        return redirect()->route('profile.index')->with(['message' => 'perfil atualizado.']);
    }
}
